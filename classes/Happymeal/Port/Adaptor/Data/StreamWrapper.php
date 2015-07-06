<?php

namespace Happymeal\Port\Adaptor\Data;

abstract class StreamWrapper {

    public static $done;

    public static $xsltErrors;

    protected $handle;

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
        //$pathinfo=NULL;
        //$url["path"]=self::parse_path($url["path"], $pathinfo);
        //$pi=pathinfo($url["path"]);
        preg_match('/\/web\/api(\/v[0-9]{1,2}\.[0-9]{1,2})?/',$url["path"],$matches);
        if(isset($matches[0])) {
            $this->exec($url);
        } else {
            //остальные файлы открывать как файлы
            $this->handle=fopen($url["path"],$mode);
        }
        
        //снова устанавливаем себя чтоб поймать следующий запрошенный урл
        stream_wrapper_unregister("file") or die(__FILE__.__LINE__);
        stream_wrapper_register("file",get_class($this)) or die(__FILE__.__LINE__);
        //set_error_handler(array(get_class($this),"xsltErrorHandler"));
        //set_error_handler( function( $errno, $errstr, $errfile, $errline ) {
        //   \Happymeal\Port\Adaptor\Data\Xml2Html::$xsltErrors.=(str_replace("XSLTProcessor::transformToXml(): ","",$errstr).PHP_EOL);
        //});

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
        stream_wrapper_register("file",get_class($this)) or die(__FILE__.__LINE__);
        //set_error_handler(array(static::CLASSNAME,"xsltErrorHandler"));
        return $stat;
    }

    
    abstract protected function exec( $url );

}
