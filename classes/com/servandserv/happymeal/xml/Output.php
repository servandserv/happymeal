<?php

namespace com\servandserv\happymeal\xml;

/**
 * $Id$
 *
 * Вывод станицы клиенту
 * В зависимости от возможностей клиента xslt-шаблонизация выполняется либо
 * на сервере либо на клиенте
 *
 * В режиме отладки всегда выполняется валидация xml-данных по схеме,
 * трансформация в html на сервере,
 * и проверка полученного результата на валидность xhtml
 *
 * при трансформации на сервере url-ы в xsl-е должны быть указаны относительные:
 * чтоб не усложнять по http он не ходит, и с адресацией от корня тоже не шарит, ибо не знает где корень
 * (чтоб гарантировать доступность как файла,так как url-ная адресация может быть нетривиальной mod_rewrite,alias...)
 *
 * в вызываемых скриптах надо обеспечить корректную работу с require_once и define
 * И СИНГЛЕТОНАМИ
 *
 * в режиме отладки выполняется профайлинг XSLT-трансформации силами libxslt, доступно только на PHP5.3,
 * результаты раскладываются в файлы /tmp/XML_Output_profiling_ипадресклиента.txt
 *
 * @author dab@bystrobank.ru
 */
class Output {

    /**
     * @var filehandle для file:// streamwrapper-а
     */
    private $handle = NULL;

    /**
     *
     * @var boolean признак завершения работы
     * //TODO выкинуть все это нафик , сделать возможность рекурсивных вызовов tryHTML из разных сткриптов
     */
    private static $done = FALSE;

    /**
     *
     * @var string буфер ошибок xslt-трансформации (они выдаются с уровнем warning - надо где-то копить все)
     */
    private static $xsltErrors = NULL;

    /**
     * проверяет возможности клиента и выдает как есть или выполняет трансформации сам
     * и выдает готовый html
     * @param string $data выходные данные в xml
     * @param boolean $html явное указание формата html
     * @param string $documentURI так как xml-документ $data передан строкой иногда требуется указать путь до него чтобы нашлись схемы
     * @param boolean $forceValidation NULL - валидация если в домашнем каталоге, TRUE: форсировать проверку по схеме/tidy всегда, FALSE - не проверять по схеме/tidy
     * @param string $htmlContentType миме-тип для вывода html, по-умолчанию text/html, для вывода html+xul передать application/xml
     */
    public static function tryHTML($data, $documentURI = NULL, $profiling = NULL) {
        $outputDom = NULL;
        $xsltResult = NULL;
        $debug = FALSE;
        $xsltProfiler = NULL;

        if (self::$done == TRUE) {
            trigger_error("XML_Output::tryHTML() called twice?");
        }

        if ($profiling === TRUE) {
            //профайлер XSLT доступен только после 5.3
            if (version_compare(PHP_VERSION, '5.3.0', '>')) {
                //разводим файлы по разным хостам - для отладки достаточно
                $xsltProfiler = "/tmp/XML_Output_profiling_".$_SERVER["REMOTE_ADDR"]."_".(isset($_SERVER["USER"]) ? $_SERVER["USER"] : (isset($_SERVER["UID"]) ? $_SERVER["UID"] : posix_getuid())).".txt";
            }
        }

        //$debug=FALSE;
        $xsltStart = $xsltStop = 0; //минипрофайлер
        $outputDom = new \DOMDocument();
        $outputDom->loadXML($data);
        if ($documentURI) {
            $outputDom->documentURI = $documentURI;
        }
        $matches = NULL;
        //добываем имя стиля из хмл-а (или xmlreader?)
        if ($outputDom->firstChild->nodeType == XML_PI_NODE && $outputDom->firstChild->target == "xml-stylesheet") {
            if (preg_match("/href\s*=\s*\"(.+)\"/", $outputDom->firstChild->data, $matches)) {
                $oldHeaders = headers_list();
                //время трансформации считаем общее - вместе с загрузкой документов
                $xsltStart = microtime(TRUE);
                $xsl = new \DomDocument();
                $xsl->load($matches[1]);

                $proc = new \XSLTProcessor();

                if ($xsltProfiler) {
                    $proc->setProfiling($xsltProfiler);
                }
                $proc->importStyleSheet($xsl);

                //регистрируем на себя обращения к файлам
                stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
                stream_wrapper_register("file", '\com\servandserv\happymeal\xml\Output') or die(__FILE__.__LINE__);

                //вешаем на обработчик выхода ловушку - если вложенный скрипт попытается сделать exit или die
                register_shutdown_function(array('\com\servandserv\happymeal\xml\Output', "checkDone"));

                //на время трансформации ставим свой специальный обработчик ошибок
                set_error_handler(array('\com\servandserv\happymeal\xml\Output', "xsltErrorHandler"));
                $xsltResult = $proc->transformToXML($outputDom);
                restore_error_handler();

                if (self::$xsltErrors != NULL) {
                    //а сообщаем об ошибках как обычно
                    trigger_error("XSLTProcessor::transformToXml(): ".self::$xsltErrors);
                }

                //ставим маркер что управление нам вернули
                self::$done = TRUE;
                unset($proc, $xsl);
                //восстанавливаем дефолтный streamwrapper для file://
                stream_wrapper_restore("file") or die(__FILE__.__LINE__);

                //закончили трансформацию
                $xsltStop = microtime(TRUE);

                if ($xsltProfiler) {
                    //ничего секретного там нет - даем всем почитать
                    chmod($xsltProfiler, 0644);
                }

                //сравним хедеры до и после
                $diffHeaders = array_diff(headers_list(), $oldHeaders);
                //сбрасываем все хедеры которых "тут не стояло"
                foreach ($diffHeaders as $h) {
                    $matches = explode(":", $h);
                    header_remove($matches[0]);
                }
                //сбросим текущие чтобы добавить старые
                foreach ($oldHeaders as $h) {
                    $matches = explode(":", $h);
                    header_remove($matches[0]);
                }
                //востановим старые как были
                foreach ($oldHeaders as $h) {
                    header($h, FALSE);
                }
                unset($diffHeaders, $oldHeaders, $h);
            }
        } else {
            // шаблон не найден отваливаемся
            trigger_error("Stylesheet not found");
        }
        self::$done = TRUE;

        unset($outputDom);

        //сообщаем клиенту что контент различен в зависимости от заголовка Accept - для кэширования нужно
        header("Vary: Accept");
        unset($data);
        header("Content-type: text/html;charset=UTF-8");
        //header("Content-Length: ".mb_strlen($xsltResult,"ASCII"));
        //результат - сборная солянка из вывода нескольких скриптов и шаблонов
        //явно кешированием управлять не пытаемся: ставим хедеры на текущее время
        //TODO возможно и хитро проанализировать хедеры всех составляющих и вычислить общий
        header("Last-Modified: ".gmdate(DATE_RFC1123));
        //header("Etag: XML_Output_" . $_SERVER["UNIQUE_ID"]);
        echo $xsltResult;
    }

    /**
      public static function transform($data) {
      $outputDom = new DOMDocument();
      $outputDom->loadXML($data);
      $xsltResult = NULL;
      $matches = NULL;
      if ($outputDom->firstChild->nodeType == XML_PI_NODE &&
      $outputDom->firstChild->target == "xml-stylesheet") {
      if (preg_match("/href\s*=\s*\"(.+)\"/", $outputDom->firstChild->data, $matches)) {
      $xsl = new DomDocument();
      $xsl->load($matches[1]);
      $proc = new XSLTProcessor();
      $proc->importStyleSheet($xsl);
      $xsltResult = $proc->transformToXML($outputDom);
      }
      }
      return $xsltResult;
      }
     */
    /**
     * вывод XML документа из файла
     * TODO: валидация по схеме в отладочном режиме
     * TODO: использование x-sendfile
     * @param type $filename имя файла
     */
    /**
      public static function sendXMLFile($filename) {
      header("Content-type: application/xml;charset=UTF-8");
      readfile($filename);
      }
     */
    /**
     * вывод XML документа из строки
     * TODO: валидация по схеме в отладочном режиме
     * @param type $xmlstring XML строка
     */
    /**
      public static function sendXML($xmlstring) {
      header("Content-type: application/xml;charset=UTF-8");
      echo $xmlstring;
      }
     */

    /**
     * Обработчик ошибок XSLT (см. PHP manual: set_error_handler)
     *
     * @param integer $errno
     * @param string $errstr
     * @param string $errfile
     * @param integer $errline
     */
    public static function xsltErrorHandler($errno, $errstr, $errfile, $errline) {
        //префикс чтоб не повторялся на каждую строку сообщения - откусим его
        self::$xsltErrors .= ( str_replace("XSLTProcessor::transformToXml(): ", "", $errstr).PHP_EOL );
    }

    /**
     *
     * реализация streamwrapper-а для протокола file:// на время трансформации
     *
     * @param string $path
     * @param string $mode
     * @param int $options
     * @param string $opened_path
     * @return boolean
     */
    public function stream_open($path, $mode, $options, &$opened_path) {
        //error_log("stream_open( $path, $mode, $options, $opened_path )\n",3,"/tmp/log");
        restore_error_handler();
        //чтобы добраться до реальной файловой системы восстанавливаем дефолтный
        stream_wrapper_restore("file") or die(__FILE__.__LINE__);

        $url = parse_url($path);
        $pathinfo = NULL;
        $url["path"] = self::parse_path($url["path"], $pathinfo);
        $pi = pathinfo($url["path"]);
        //если файл .php - наш клиент - обрабатываем сами
        if (isset($pi["extension"]) && !strncmp($pi["extension"], "php", 3)) {
            //сохраняем окружение
            $oldServer = $_SERVER;
            $oldRequest = $_REQUEST;
            $oldGet = $_GET;
            $oldPost = $_POST;
            $oldPwd = getcwd();
            $oldPath = get_include_path();
            if ($pathinfo) {
                $_SERVER["PATH_INFO"] = $pathinfo;
            }
            //предполагаемое дефолтное значение
            $oldStatus = "200 OK";
            $hl = headers_list();
            for ($i = 0; $i < count($hl); $i++) {
                if (!strncmp($hl[$i], "Status:", 7)) {
                    $oldStatus = substr($hl[$i], 8);
                }
            }
            //устанавливаем окружение для скрипта
            //разбираем и подсовываем параметры
            if (isset($url["query"])) {
                parse_str($url["query"], $_GET);
                $_SERVER["QUERY_STRING"] = $url["query"];
            } else {
                $_GET = array();
                $_SERVER["QUERY_STRING"] = NULL;
            }
            $_SERVER["REQUEST_METHOD"] = "GET"; //другого не умем
            $_POST = array(); //дожен быть пустым
            $_REQUEST = $_GET;
            //ставим переменные на скрипт, чтоб логика внутри правильно отработала
            $d1 = dirname(__FILE__);
            $d2 = dirname($url["path"]);
            $rd = "";
            if ($d1 != $d2) {
                //пути отличаются - вычисляем относительный путь чтоб подставить в урл
                $rd = $this->RelativePath($d1, $d2).DIRECTORY_SEPARATOR;
            }
            $_SERVER["PHP_SELF"] = dirname($_SERVER["PHP_SELF"]).DIRECTORY_SEPARATOR.$rd.basename($url["path"]);
            $_SERVER["SCRIPT_NAME"] = $_SERVER["PHP_SELF"];
            $_SERVER["SCRIPT_FILENAME"] = $url["path"];
            $_SERVER["SCRIPT_URL"] = $_SERVER["PHP_SELF"];
            //SCRIPT_URI
            $_SERVER["REDIRECT_URL"] = $_SERVER["PHP_SELF"];
            //предотвращаем обработку скриптами заголовках переданных на самом деле головному скрипту
            unset($_SERVER["HTTP_IF_MODIFIED_SINCE"], $_SERVER["REDIRECT_HTTP_IF_MODIFIED_SINCE"]);
            unset($_SERVER["HTTP_IF_NONE_MATCH"], $_SERVER["REDIRECT_HTTP_IF_NONE_MATCH"]);
            unset($_SERVER["HTTP_IF_MATCH"], $_SERVER["REDIRECT_HTTP_IF_MATCH"]);
            if (isset($_SERVER["UNIQUE_ID"])) {
                //подменяем "уникальный" идентификатор чтобы у каждого скрипта он был свой
                $_SERVER["UNIQUE_ID"] = base_convert(md5(uniqid(rand(), TRUE)), 16, 36);
            }

            chdir($d2);
            //"вызываем" скрипт
            $this->exec();

            //восстанавливаем окружение
            $_SERVER = $oldServer;
            $_REQUEST = $oldRequest;
            $_GET = $oldGet;
            $_POST = $oldPost;
            chdir($oldPwd);
            set_include_path($oldPath);

            //проверим не изменил ли вызванный скрипт заголовок Status
            //это для тех кто не умеет бросать исключения и падать сам при ошибках
            $hl = headers_list();
            for ($i = 0; $i < count($hl); $i++) {
                if (!strncmp($hl[$i], "Status:", 7) && substr($hl[$i], 8) != $oldStatus) {
                    throw new Exception("invalid header '".$hl[$i]."'");
                }
            }

            //trigger_error("ops".print_r(headers_list(),TRUE));
        } else {
            //остальные файлы открывать как файлы
            $this->handle = fopen($url["path"], $mode);
        }

        //снова устанавливаем себя чтоб поймать следующий запрошенный урл
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_register("file", get_class($this)) or die(__FILE__.__LINE__);
        set_error_handler(array('\com\servandserv\happymeal\xml\Output', "xsltErrorHandler"));
        return TRUE;
    }

    public function stream_close() {
        return fclose($this->handle);
    }

    public function stream_read($count) {
        return fread($this->handle, $count);
    }

    public function stream_write($data) {
        return fwrite($this->handle, $data);
    }

    public function stream_tell() {
        return ftell($this->handle);
    }

    public function stream_eof() {
        return feof($this->handle);
    }

    public function stream_seek($offset, $whence) {
        return fseek($this->handle, $offset, $whence);
    }

    public function stream_stat() {
        return fstat($this->handle);
    }

    public function url_stat($path, $flags) {
        restore_error_handler();
        //запрос stat проводим к реальной файловой системе
        stream_wrapper_restore("file") or die(__FILE__.__LINE__);
        $stat = stat(self::parse_path(parse_url($path, PHP_URL_PATH)));
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_register("file", get_class($this)) or die(__FILE__.__LINE__);
        set_error_handler(array('\com\servandserv\happymeal\xml\Output', "xsltErrorHandler"));
        return $stat;
    }

    /**
     * этот метод-заглушка для изоляции локальных переменных вызывающего от локальных переменных вызываемого
     * $_SERVER["SCRIPT_FILENAME"] должен быть заранее указан - тоже чтоб не использовать локальные переменные
     */
    private function exec() {
        ob_start();
        require($_SERVER["SCRIPT_FILENAME"]);
        $this->handle = tmpfile();
        fwrite($this->handle, ob_get_contents()); //сохраняем весь вывод в реальный файл
        fseek($this->handle, 0); //перематываем на начало файла
        ob_end_clean();
    }

    /**
     * проверялка корректности завершения работы
     * если вложенный скрипт завершился раньше и не вернул управление - ошибка
     */
    public static function checkDone() {
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_restore("file") or die(__FILE__.__LINE__);
        if (self::$done != TRUE) {
            error_log("AHTUNG! restart php now!");
            //тут не прокатывает trigger_error() - зовем напрямую
            UncaughtFatalErrorExceptionHandler(new FatalErrorException("do not use EXIT() in included script"));
        }
    }

    /**
     * Вычисляет относительный путь между двумя абсолютными путями
     *
     * @link http://mrpmorris.blogspot.com/2007/05/convert-absolute-path-to-relative-path.html
     *
     * @param string $path1 путь1
     * @param string $path2 путь2
     * @return string относительный путь
     */
    private static function RelativePath($ap, $rt) {
        $ad = explode(DIRECTORY_SEPARATOR, $ap);
        $rd = explode(DIRECTORY_SEPARATOR, $rt);

        $adlen = count($ad);
        $rdlen = count($rd);
        //Get the shortest of the two paths
        $length = $adlen < $rdlen ? $adlen : $rdlen;

        //Use to determine where in the loop we exited
        $lastCommonRoot = -1;

        //Find common root
        for ($index = 0; $index < $length; $index++) {
            if ($ad[$index] == $rd[$index]) {
                $lastCommonRoot = $index;
            } else {
                break;
            }
        }
        //If we didn't find a common prefix then throw
        if ($lastCommonRoot == -1) {
            throw new Exception("Paths do not have a common base");
        }

        //Build up the relative path
        $rp = "";

        //Add on the ..
        for ($index = $lastCommonRoot + 1; $index < $adlen; $index++) {
            if (strlen($ad[$index]) > 0) {
                $rp .= ("..".DIRECTORY_SEPARATOR);
            }
        }

        //Add on the folders
        for ($index = $lastCommonRoot + 1; $index < $rdlen - 1; $index++) {
            $rp .= ($rd[$index].DIRECTORY_SEPARATOR);
        }
        $rp .= ($rd[$rdlen - 1]);

        return $rp;
    }

    private static function parse_path($path, &$pathinfo = NULL) {
        $pathinfo = NULL;
        $result = $path;
        $pos = strpos($path, ".php/");
        if ($pos !== FALSE) {
            $result = substr($path, 0, $pos + 4);
            $pathinfo = substr($path, $pos + 4);
        }
        return $result;
    }

}
