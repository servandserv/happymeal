<?php

namespace Happymeal\Port\Adaptor\HTTP;

/**
 * Вывод станицы клиенту
 * В зависимости от возможностей клиента xslt-шаблонизация выполняется либо
 * на сервере либо на клиенте
 * 
 * Упощенный вариант без валидации и проверки вывода
 * подстраиваемся под REST api и подмену путей
 *
 * в вызываемых скриптах надо обеспечить корректную работу с require_once и define
 * И СИНГЛЕТОНАМИ
 *
 */

class Xml2Html {

    const CLASSNAME = "\Happymeal\Port\Adaptor\HTTP\Xml2Html";

    /**
     * @var filehandle для file:// streamwrapper-а
     */
    private $handle=NULL;
    /**
     *
     * @var boolean признак завершения работы
     * //TODO выкинуть все это нафик , сделать возможность рекурсивных вызовов tryHTML из разных сткриптов
     */
    private static $done=FALSE;
    /**
     *
     * @var string буфер ошибок xslt-трансформации (они выдаются с уровнем warning - надо где-то копить все)
     */
    private static $xsltErrors=NULL;

    /**
     * проверяет возможности клиента и выдает как есть или выполняет трансформации сам
     * и выдает готовый html
     * @param string $data выходные данные в xml
     * @param boolean $html явное указание формата html
     * @param string $documentURI так как xml-документ $data передан строкой иногда требуется указать путь до него чтобы нашлись схемы
     * @param boolean $forceValidation NULL - валидация если в домашнем каталоге, TRUE: форсировать проверку по схеме/tidy всегда, FALSE - не проверять по схеме/tidy
     * @param string $htmlContentType миме-тип для вывода html, по-умолчанию text/html, для вывода html+xul передать application/xml
     */
    public static function tryHTML( $data, $html=FALSE, $documentURI=NULL, $forceValidation=NULL, $htmlContentType="text/html" ) {
        $outputDom=NULL;
        $xsltResult=NULL;
        $debug=FALSE;
        $xsltProfiler=NULL;
        
        if(self::$done==TRUE) {
            trigger_error("Output::tryHTML() called twice?");
        }
        
        $xsltStart=$xsltStop=0; //минипрофайлер
        if( $html==FALSE && isset($_SERVER["HTTP_ACCEPT"]) ) {
            //тут пока неразбериха с text/xml по старому и application/xml по новому
            //опера по-новому, ие по-старому, мозиллы и так и сяк
            if( strpos($_SERVER["HTTP_ACCEPT"],"/xml")!==FALSE ) {
                //тем кто явно грит "понимаю xml" сбросим флаг html
                $html=FALSE;
                if( "application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5" == $_SERVER["HTTP_ACCEPT"] ){
                    //но некоторые говорят что понимают, но на самом деле не понимают, это андроиды 2.х их мы отлавливаем по кривому заголовку
                    //под раздачу также попадают ближайщие родственники, которые реально умеют, но их не отличить от больных - сафари 4 (айфон 4).
                    //остальные родственники успешно вылечились - сафари 5, хромы и хромиумы и другие вэбкитообразные.
                    //используем заголовок Accept а не Usera-gent потому что
                    //1. уже есть Vary: Accept - чтоб не плодить ветвление в прокси и кешах
                    //2. у больных особей есть переключатель "mobile view" который влияет на User-agent-а
                    // @seealso http://www.gethifi.com/blog/browser-rest-http-accept-headers
                    // @seealso https://developer.mozilla.org/en-US/docs/HTTP/Content_negotiation
                    $html=TRUE;
                }
            } elseif ( strpos($_SERVER["HTTP_ACCEPT"],"text/html")!==FALSE ) {
                //тем кто не понимает xml но явно грит что умеет html
                $html=TRUE;
            }
        } elseif(isset($_SERVER["HTTP_ACCEPT"])) {
            //"обратная автоматика" - даже если форсирован HTML но клиент его "не хочет" или "не может", но обещает что поймет XML - спрыгиваем на XML
            if (strpos($_SERVER["HTTP_ACCEPT"],"text/html")===FALSE && strpos($_SERVER["HTTP_ACCEPT"],"/xml")!==FALSE) {
                //тем кто явно заявляет что понимает xml и не умеет html
                $html=FALSE;
            }
        }
        //$html=TRUE;
        //подготовить стили для трансформации на php
        if( $debug || $html ) {
            $outputDom=new \DOMDocument();
            $outputDom->loadXML($data);
            if( $documentURI ){
                $outputDom->documentURI=$documentURI;
            }
            //валидация данных xml-схемой
            if( $debug ) {
                $matches=NULL;
                //добываем имя схемы и проверяем по ней (или xmlreader?)
                if( preg_match("/schemaLocation=\".+\s([a-zA-Z0-9_\/\.\-]+)\"/",$data,$matches) ) {
                    $outputDom->schemaValidate(($documentURI?dirname($documentURI)."/":"").$matches[1]);
//                } else {
//                    throw new \Exception("cant find schemaLocation");
                }
            }
            $matches=NULL;
            //добываем имя стиля из хмл-а (или xmlreader?)
            if( $outputDom->firstChild->nodeType==XML_PI_NODE &&
                $outputDom->firstChild->target=="xml-stylesheet" ) {
                if( preg_match("/href\s*=\s*\"(.+)\"/",$outputDom->firstChild->data,$matches) ) {
                    $oldHeaders=headers_list();
                    //время трансформации считаем общее - вместе с загрузкой документов
                    $xsltStart=microtime(TRUE);
                    $xsl=new \DomDocument();
                    // надо взять таблицу стилей локально
                    $xsl_file = dirname($_SERVER["SCRIPT_FILENAME"])."/".str_replace("http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"]),"",$matches[1]);
                    //error_log(dirname($_SERVER["SCRIPT_FILENAME"]));
                    //error_log($_SERVER["PHP_SELF"]);
                    //$xsl->load($matches[1]);
                    $xsl->load("$xsl_file");

                    $proc=new \XSLTProcessor();

                    if ($xsltProfiler) {
                        $proc->setProfiling($xsltProfiler);
                    }
                    $proc->importStyleSheet($xsl);

                    //регистрируем на себя обращения к файлам
                    stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
                    stream_wrapper_register("file",static::CLASSNAME) or die(__FILE__.__LINE__);

                    //вешаем на обработчик выхода ловушку - если вложенный скрипт попытается сделать exit или die
                    register_shutdown_function(array(static::CLASSNAME,"checkDone"));

                    //на время трансформации ставим свой специальный обработчик ошибок
                    set_error_handler(array(static::CLASSNAME,"xsltErrorHandler"));
                    $xsltResult=$proc->transformToXML($outputDom);
                    restore_error_handler();

                    if(self::$xsltErrors!=NULL){
                        //а сообщаем об ошибках как обычно
                        trigger_error("XSLTProcessor::transformToXml(): ".self::$xsltErrors);
                    }

                    //ставим маркер что управление нам вернули
                    self::$done=TRUE;
                    unset($proc, $xsl);
                    //восстанавливаем дефолтный streamwrapper для file://
                    stream_wrapper_restore("file") or die(__FILE__.__LINE__);

                    //закончили трансформацию
                    $xsltStop=microtime(TRUE);

                    if ($xsltProfiler) {
                        //ничего секретного там нет - даем всем почитать
                        chmod($xsltProfiler,0644);
                    }

                    //сравним хедеры до и после
                    $diffHeaders=array_diff(headers_list(),$oldHeaders);
                    //сбрасываем все хедеры которых "тут не стояло"
                    foreach( $diffHeaders as $h ) {
                        $matches = explode(":", $h);
                        header_remove($matches[0]);
                    }
                    //сбросим текущие чтобы добавить старые
                    foreach( $oldHeaders as $h ) {
                        $matches = explode(":", $h);
                        header_remove($matches[0]);
                    }
                    //востановим старые как были
                    foreach( $oldHeaders as $h ) {
                        header($h, FALSE);
                    }
                    unset($diffHeaders, $oldHeaders, $h);
                }
            } else {
                //стиль не найден - html не получится - сбрасываем флаг
                $html=FALSE;
            }
        }
        self::$done=TRUE;

        
        //валидация выходного html с помощью tidy и по dtd-схеме
        if( 1!=1 && $debug && $xsltResult ) {
            //http://dab.net.ilb.ru/doc/htmltidy-5.10.26-r2/html/quickref.html
            if (strncmp($xsltResult, "<!DOCTYPE html SYSTEM \"about:legacy-compat\">", 44)) {
                $config=array(
                    //"input-xml"=>TRUE,
                    "output-xhtml"=>TRUE,
                    "doctype"=>"strict",
                );
                $tidy=tidy_parse_string($xsltResult,$config,"UTF8");//для tidy БЕЗ минуса
                $tidy->diagnose();
                if( tidy_error_count($tidy)+tidy_warning_count($tidy) ) {
                    // tidy возвращает строку с ошибкой, пронумеровал для облегчения отладки
                    $xsltResultLines=explode(PHP_EOL,$xsltResult);
                    $xsltResultWithLines="";
                    foreach($xsltResultLines as $lineNumber=>$line){
                        $xsltResultWithLines.=sprintf("%04d: ",($lineNumber+1)).$line.PHP_EOL;
                    }
                    throw new Exception("tidy validation errors: ".$tidy->errorBuffer.PHP_EOL.$xsltResultWithLines);
                }
                //уберемся за собой
                unset($tidy,$config);
            } else {
                //html5 проверяем через локально развернутый сервис validator.nu
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_HEADER, 0);

                //TODO разобраться с нумерацией строк (с формы строки соответсвуют исходнику, а когда через сервис все в одну строку)
                curl_setopt($ch, CURLOPT_URL, "http://devel.net.ilb.ru:8888/?parser=html5&out=gnu");

                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/html"));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xsltResult);

                ob_start();
                curl_exec($ch);
                $out = ob_get_contents();
                ob_end_clean();

                $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($code != 200) {
                    trigger_error("curl failed " . curl_error($ch) . " HTTP" . $code . PHP_EOL . $out);
                }
                curl_close($ch);
                //исправление косяков html5-валидатора связанных с отсутствием стандарта
                //пропускаем предупреждения связанные с input type="date"
                $out = trim(preg_replace("/^:.+info warning: The “date” input type is so far supported properly.*/m", "", $out));
                if ($out) {
                    $xsltResultLines=explode(PHP_EOL,$xsltResult);
                    $xsltResultWithLines="";
                    foreach($xsltResultLines as $lineNumber=>$line){
                        $xsltResultWithLines.=sprintf("%04d: ",($lineNumber+1)).$line.PHP_EOL;
                    }
                    throw new \Exception("validator.nu errors: " . PHP_EOL . $out . PHP_EOL . $xsltResultWithLines);
                }
                //уберемся за собой
                unset($ch,$out,$code);
            }

            $xsltResultDoc=new \DOMDocument();
            //поиск схемы для проверки xhtml - ищем по обычным путям как и классы
            $schemasPath=NULL;
            foreach(explode(PATH_SEPARATOR,get_include_path()) as $p){
                $p = $p.DIRECTORY_SEPARATOR."schemas";
                if(file_exists($p.DIRECTORY_SEPARATOR."xhtml".DIRECTORY_SEPARATOR."dtd".DIRECTORY_SEPARATOR."xhtml1-strict.dtd")){
                    $schemasPath=$p;
                    break;
                }
            }

            $xsltResultXml = str_replace(
                array(
                    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd",
                    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"
                    ),
                array(
                    $schemasPath.DIRECTORY_SEPARATOR."xhtml".DIRECTORY_SEPARATOR."dtd".DIRECTORY_SEPARATOR."xhtml1-strict.dtd",
                    $schemasPath.DIRECTORY_SEPARATOR."xhtml11".DIRECTORY_SEPARATOR."dtd".DIRECTORY_SEPARATOR."xhtml11-flat.dtd",
                    ),
                $xsltResult);

            //поддерживается только Strict. как явно указать валидатору xml-catalog непонятно (с комстроки работает xmllint --catalog)
            $xsltResultDoc->loadXML($xsltResultXml);
            if( $documentURI ){
                $outputDom->documentURI=$documentURI;
            }
            if( $xsltResultDoc->doctype->systemId != "about:legacy-compat" ){
                if( !$xsltResultDoc->validate() ) {
                    throw new \Exception("DTD validation errors");
                }
            }
            unset($xsltResultDoc, $xsltResultXml, $schemasPath, $p);
            //тут можно и прочую статистику по внутренностям добавить
            header("X-XML-Output-tryHTML: HTML=".($html?"TRUE":"FALSE")." XSLTtime=".sprintf("%0.4f",$xsltStop-$xsltStart)."s size=".mb_strlen($data,"ASCII")."/".mb_strlen($xsltResult,"ASCII"));
        }

        unset($outputDom);

        //сообщаем клиенту что контент различен в зависимости от заголовка Accept - для кэширования нужно
        header("Vary: Accept");
        if( $html ) {
            unset($data);
            header("Content-type: $htmlContentType;charset=UTF-8");
            //header("Content-Length: ".mb_strlen($xsltResult,"ASCII"));
            //результат - сборная солянка из вывода нескольких скриптов и шаблонов
            //явно кешированием управлять не пытаемся: ставим хедеры на текущее время
            //TODO возможно и хитро проанализировать хедеры всех составляющих и вычислить общий
            //header("Last-Modified: ".gmdate(DATE_RFC1123));
            //header("Etag: Output_".$_SERVER["UNIQUE_ID"]);
            echo $xsltResult;
        } else {
            unset($xsltResult);
            header("Content-type: application/xml");
            //header("Content-Length: ".mb_strlen($data,"ASCII"));
            echo $data;
        }
    }
    
    public static function transform($data) {
        $outputDom = new \DOMDocument();
        $outputDom->loadXML($data);
        $xsltResult=NULL;
        $matches = NULL;
        if ($outputDom->firstChild->nodeType == XML_PI_NODE &&
            $outputDom->firstChild->target == "xml-stylesheet") {
            if (preg_match("/href\s*=\s*\"(.+)\"/", $outputDom->firstChild->data, $matches)) {
                $xsl = new \DomDocument();
                $xsl->load($matches[1]);
                $proc = new \XSLTProcessor();
                $proc->importStyleSheet($xsl);
                $xsltResult = $proc->transformToXML($outputDom);
            }
        }
        return $xsltResult;
    }

    /**
     * вывод XML документа из файла
     * TODO: валидация по схеме в отладочном режиме
     * TODO: использование x-sendfile
     * @param type $filename имя файла
     */
    public static function sendXMLFile($filename){
        header("Content-type: application/xml;charset=UTF-8");
        readfile($filename);
    }

    /**
     * вывод XML документа из строки
     * TODO: валидация по схеме в отладочном режиме
     * @param type $xmlstring XML строка
     */
    public static function sendXML($xmlstring){
        header("Content-type: application/xml;charset=UTF-8");
        echo $xmlstring;
    }

    /**
     * Обработчик ошибок XSLT (см. PHP manual: set_error_handler)
     *
     * @param integer $errno
     * @param string $errstr
     * @param string $errfile
     * @param integer $errline
     */
    public static function xsltErrorHandler($errno, $errstr, $errfile, $errline){
        //префикс чтоб не повторялся на каждую строку сообщения - откусим его
        self::$xsltErrors.=(str_replace("XSLTProcessor::transformToXml(): ","",$errstr).PHP_EOL);
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
    public function stream_open( $path, $mode, $options, &$opened_path ) {
        restore_error_handler();
        //чтобы добраться до реальной файловой системы восстанавливаем дефолтный
        stream_wrapper_restore("file") or die(__FILE__.__LINE__);
        $url=parse_url($path);
        $pathinfo=NULL;
        $url["path"]=self::parse_path($url["path"], $pathinfo);
        $pi=pathinfo($url["path"]);
        //если файл .php - наш клиент - обрабатываем сами
        // если есть в пути подстрока  web/api то тоже наш случай 
        error_log("Path - ".$path);
        error_log("PHP_SELF - ".$_SERVER["PHP_SELF"]);
        error_log("URL - ".print_r($url,true));
        if(isset($url["query"])) {
            parse_str($url["query"],$output);
            error_log("QUERY - ".print_r($output,true));
        }
        preg_match('/\/web\/api(\/v[0-9]{1,2}\.[0-9]{1,2})?/',$url["path"],$matches);
         
        if( isset($matches[0]) || ( isset($pi["extension"]) && !strncmp($pi["extension"],"php",3) ) ) {
            $this->exec();
            /*
            //сохраняем окружение
            $oldServer=$_SERVER;
            $oldRequest=$_REQUEST;
            $oldGet=$_GET;
            $oldPost=$_POST;
            $oldPwd=getcwd();
            $oldPath=get_include_path();
            if($pathinfo){
                $_SERVER["PATH_INFO"]=$pathinfo;
            }
            //предполагаемое дефолтное значение
            $oldStatus = "200 OK";
            $hl = headers_list();
            for ($i = 0; $i  <count( $hl ); $i++) {
                if( !strncmp($hl[$i], "Status:", 7)) {
                    $oldStatus = substr($hl[$i], 8);
                }
            }
            //устанавливаем окружение для скрипта

            //разбираем и подсовываем параметры
            if( isset($url["query"]) ) {
                parse_str($url["query"],$_GET);
                $_SERVER["QUERY_STRING"]=$url["query"];
            } else {
                $_GET=array();
                $_SERVER["QUERY_STRING"]=NULL;
            }
            $_SERVER["REQUEST_METHOD"]="GET";//другого не умем
            $_POST=array();//дожен быть пустым
            $_REQUEST=$_GET;
            
            // разный подмены на случай обработки обычного скрипта или подмененной строки api
            // api
           // if(isset($matches[0])) {
            
                $app = \App::getInstance();
            
                $_SERVER["PHP_SELF"]=$url["path"];
                $_SERVER["SCRIPT_URL"] = "/digests";//$url["path"];
                $_SERVER["REDIRECT_REDIRECT_SCRIPT_URL"] = "/digests";//$url["path"];
                $_SERVER["REDIRECT_SCRIPT_URL"] = "/digests";//$url["path"];
                $_SERVER["REQUEST_URI"] = "/digests";//$url["path"];
                $_SERVER["HTTP_ACCEPT"] = "application/xml";
                
                $app->resetAll();
                
                //предотвращаем обработку скриптами заголовках переданных на самом деле головному скрипту
                unset($_SERVER["HTTP_IF_MODIFIED_SINCE"],$_SERVER["REDIRECT_HTTP_IF_MODIFIED_SINCE"]);
                unset($_SERVER["HTTP_IF_NONE_MATCH"],$_SERVER["REDIRECT_HTTP_IF_NONE_MATCH"]);
                unset($_SERVER["HTTP_IF_MATCH"],$_SERVER["REDIRECT_HTTP_IF_MATCH"]);
                if( isset($_SERVER["UNIQUE_ID"]) ) {
                    //подменяем "уникальный" идентификатор чтобы у каждого скрипта он был свой
                    $_SERVER["UNIQUE_ID"]=base_convert(md5(uniqid(rand(),TRUE)),16,36);
                }
                
                //"вызываем" скрипт
                $this->exec();
                
                //восстанавливаем окружение
                $_SERVER=$oldServer;
                $_REQUEST=$oldRequest;
                $_GET=$oldGet;
                $_POST=$oldPost;
                set_include_path($oldPath);

                $app->resetPaths();
                
            } else {
                //ставим переменные на скрипт, чтоб логика внутри правильно отработала
                $d1=dirname(__FILE__);
                $d2=dirname($url["path"]);
                $rd="";
                if( $d1!=$d2 ) {
                    //пути отличаются - вычисляем относительный путь чтоб подставить в урл
                    $rd=$this->RelativePath($d1,$d2).DIRECTORY_SEPARATOR;
                }
                $_SERVER["PHP_SELF"]=dirname($_SERVER["PHP_SELF"]).DIRECTORY_SEPARATOR.$rd.basename($url["path"]);
                $_SERVER["SCRIPT_NAME"]=$_SERVER["PHP_SELF"];
                $_SERVER["SCRIPT_FILENAME"]=$url["path"];
                $_SERVER["SCRIPT_URL"]=$_SERVER["PHP_SELF"];
                //SCRIPT_URI
                $_SERVER["REDIRECT_URL"]=$_SERVER["PHP_SELF"];
                
                //предотвращаем обработку скриптами заголовках переданных на самом деле головному скрипту
                unset($_SERVER["HTTP_IF_MODIFIED_SINCE"],$_SERVER["REDIRECT_HTTP_IF_MODIFIED_SINCE"]);
                unset($_SERVER["HTTP_IF_NONE_MATCH"],$_SERVER["REDIRECT_HTTP_IF_NONE_MATCH"]);
                unset($_SERVER["HTTP_IF_MATCH"],$_SERVER["REDIRECT_HTTP_IF_MATCH"]);
                if( isset($_SERVER["UNIQUE_ID"]) ) {
                    //подменяем "уникальный" идентификатор чтобы у каждого скрипта он был свой
                    $_SERVER["UNIQUE_ID"]=base_convert(md5(uniqid(rand(),TRUE)),16,36);
                }
                chdir($d2);
                
                //"вызываем" скрипт
                $this->exec();
                
                //восстанавливаем окружение
                $_SERVER=$oldServer;
                $_REQUEST=$oldRequest;
                $_GET=$oldGet;
                $_POST=$oldPost;
                chdir($oldPwd);
                set_include_path($oldPath);
                
                //проверим не изменил ли вызванный скрипт заголовок Status
                //это для тех кто не умеет бросать исключения и падать сам при ошибках
                $hl = headers_list();
                for ($i = 0; $i < count( $hl ); $i++) {
                    if (!strncmp($hl[$i], "Status:", 7) && substr($hl[$i], 8) != $oldStatus) {
                        throw new \Exception("invalid header '" . $hl[$i] . "'");
                    }
                }
                //trigger_error("ops".print_r(headers_list(),TRUE));
            }
            */
        } else {
            //остальные файлы открывать как файлы
            $this->handle=fopen($url["path"],$mode);
        }
        
        //снова устанавливаем себя чтоб поймать следующий запрошенный урл
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_register("file",static::CLASSNAME) or die(__FILE__.__LINE__);
        set_error_handler(array(static::CLASSNAME,"xsltErrorHandler"));
        return TRUE;
    }

    public function stream_close() {
        return fclose($this->handle);
    }

    public function stream_read($count) {
        return fread($this->handle,$count);
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

    public function url_stat($path,$flags) {
        restore_error_handler();
        //запрос stat проводим к реальной файловой системе
        stream_wrapper_restore("file") or die(__FILE__.__LINE__);
        $filename = self::parse_path(parse_url($path,PHP_URL_PATH));
        // если адрес выполняемого скрипта фейковый, то просто подставляем исполняемый файл
        if(file_exists($filename)) {
            $stat=stat($filename);
        } else {
            $stat = stat(__FILE__);
        }
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_register("file",static::CLASSNAME) or die(__FILE__.__LINE__);
        set_error_handler(array(static::CLASSNAME,"xsltErrorHandler"));
        return $stat;
    }

    /**
     * этот метод-заглушка для изоляции локальных переменных вызывающего от локальных переменных вызываемого
     * $_SERVER["SCRIPT_FILENAME"] должен быть заранее указан - тоже чтоб не использовать локальные переменные
     */
    private function exec() {
        ob_start();
        echo("<?xml version=\"1.0\" encoding=\"utf-8\"?><path>".$_SERVER["SCRIPT_FILENAME"]."</path>");
        //if(file_exists($_SERVER["SCRIPT_FILENAME"])) {
        //    require($_SERVER["SCRIPT_FILENAME"]);
        //} else {
        //    $app = \App::getInstance();
        //    $app->locate("CONTROLLER");
        //}
        $this->handle=tmpfile();
        $content = ob_get_contents();
        fwrite($this->handle,$content);//сохраняем весь вывод в реальный файл
        fseek($this->handle,0);//перематываем на начало файла
        ob_end_clean();
    }

    /**
     * проверялка корректности завершения работы
     * если вложенный скрипт завершился раньше и не вернул управление - ошибка
     */
    public static function checkDone() {
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_restore("file") or die(__FILE__.__LINE__);
        if(self::$done!=TRUE) {
            error_log("AHTUNG! restart php now!");
            //тут не прокатывает trigger_error() - зовем напрямую
            UncaughtFatalErrorExceptionHandler(new \FatalErrorException("do not use EXIT() in included script"));
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
    private static function RelativePath($ap,$rt) {
        $ad=explode(DIRECTORY_SEPARATOR,$ap);
        $rd=explode(DIRECTORY_SEPARATOR,$rt);

        $adlen=count($ad);
        $rdlen=count($rd);
        //Get the shortest of the two paths
        $length=$adlen<$rdlen?$adlen:$rdlen;

        //Use to determine where in the loop we exited
        $lastCommonRoot=-1;

        //Find common root
        for( $index=0; $index<$length; $index++ ) {
            if( $ad[$index]==$rd[$index] ) {
                $lastCommonRoot = $index;
            } else {
                break;
            }
        }
        //If we didn't find a common prefix then throw
        if( $lastCommonRoot==-1 ) {
            throw new \Exception("Paths do not have a common base");
        }

        //Build up the relative path
        $rp="";

        //Add on the ..
        for( $index=$lastCommonRoot+1; $index<$adlen; $index++ ) {
            if( strlen($ad[$index])>0 ) {
                $rp.=("..".DIRECTORY_SEPARATOR);
            }
        }

        //Add on the folders
        for( $index=$lastCommonRoot+1;$index<$rdlen-1; $index++ ) {
            $rp.=($rd[$index].DIRECTORY_SEPARATOR);
        }
        $rp.=($rd[$rdlen-1]);

        return $rp;
    }
    private static function parse_path($path,&$pathinfo=NULL) {
        $pathinfo=NULL;
        $result=$path;
        $pos=strpos($path,".php/");
        if($pos!==FALSE){
            $result=substr($path,0,$pos+4);
            $pathinfo=substr($path,$pos+4);
        }
        return $result;
    }

}

/* eof */
