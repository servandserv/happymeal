<?php

namespace Happymeal\Port\Adaptor\Data;

class Xml2Html {

    const CLASSNAME = "\Happymeal\Port\Adaptor\Data\Xml2Html";

    public static $done;
    public static $xsltErrors;
    public static $fn;

    public $handle;

    public static function transform( $xmlstr, $fn ) {

        static::$fn = $fn;

        if(self::$done==TRUE) {
            trigger_error("Xml2Html::transform() called twice?");
        }

        $outputDom=new \DOMDocument();
        $outputDom->loadXML($xmlstr);
        $matches=NULL;
        //добываем имя стиля из хмл-а (или xmlreader?)
        if( $outputDom->firstChild->nodeType==XML_PI_NODE && $outputDom->firstChild->target=="xml-stylesheet" ) {
            if( preg_match("/href\s*=\s*\"(.+)\"/",$outputDom->firstChild->data,$matches) ) {

                $xsl=new \DomDocument();
                //error_log(print_r($_SERVER,true));exit;
                $xsl_file = dirname($_SERVER["SCRIPT_FILENAME"])."/".str_replace("http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"]),"",$matches[1]);
                $xsl->load($xsl_file);
                $proc=new \XSLTProcessor();
                $proc->importStyleSheet($xsl);

                //регистрируем на себя обращения к файлам
                stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
                stream_wrapper_register("file", static::CLASSNAME ) or die(__FILE__.__LINE__);
                //вешаем на обработчик выхода ловушку - если вложенный скрипт попытается сделать exit или die
                register_shutdown_function( function() {
                    stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
                    stream_wrapper_restore("file") or die(__FILE__.__LINE__);
                    if( self::$done!=TRUE ) {
                        error_log("AHTUNG! restart php now!");
                        //тут не прокатывает trigger_error() - зовем напрямую
                        UncaughtFatalErrorExceptionHandler(new \FatalErrorException("do not use EXIT() in included script"));
                    }
                });
                //на время трансформации ставим свой специальный обработчик ошибок
                set_error_handler(array(static::CLASSNAME,"xsltErrorHandler"));
                $xsltResult=$proc->transformToXML($outputDom);
                restore_error_handler();

                if(self::$xsltErrors!=NULL){
                    //а сообщаем об ошибках как обычно
                    trigger_error("XSLTProcessor::transformToXml(): ".\Happymeal\Port\Adaptor\Data\Xml2Html::$xsltErrors);
                }

                //ставим маркер что управление нам вернули
                self::$done = TRUE;
                unset($proc, $xsl);
                //восстанавливаем дефолтный streamwrapper для file://
                stream_wrapper_restore("file") or die(__FILE__.__LINE__);
            }
        }
        self::$done = TRUE;
        unset($outputDom);
        return isset($xsltResult) ? $xsltResult : $xmlstr;
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
        preg_match('/\/web\/api(\/v[0-9]{1,2}\.[0-9]{1,2})?/',$url["path"],$matches);
        if(isset($matches[0])) {
            $this->handle = call_user_func(static::$fn,$url);
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
        //$filename = self::parse_path(parse_url($path,PHP_URL_PATH));
        // если адрес выполняемого скрипта фейковый, то просто подставляем исполняемый файл
        //if(file_exists($filename)) {
        //    $stat=stat($filename);
        //} else {
            $stat = stat(__FILE__);
        //}
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_register("file",self::CLASSNAME) or die(__FILE__.__LINE__);
        set_error_handler(array(self::CLASSNAME,"xsltErrorHandler"));
        return $stat;
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

}
