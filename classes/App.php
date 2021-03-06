<?php

class App implements \Happymeal\ErrorHandler {

	private static $instance=null;
	private $_container;
	private $_server;
	private $accept = array();
	private $default_replace_pairs = array(
		"\r" => '', //браузер для совместимости добавляет долбаный вендовый перевод строки - вырезаем его
		"&" => '&amp;', //экранировать амперсанд
		"&#8470;" => 'N', //русский "номер" заменить на N
		"&#171;" => '"', //заменить ковычки << на "
		"&#187;" => '"', //заменить ковычки >> на "
		"&#8211;" => '-', //заменить "длинное тире" на -
		"&#8212;" => '-', //заменить "длинное тире" на -
		"–" => '-',
		"—" => '-',
		"―" => '-',
		"«" => '"',
		"»" => '"',
		"№" => 'N',
	);
	private $founded;
	private $cached;
	
    private function __construct() {
	    $this->setPaths( $_SERVER['SCRIPT_URL'] );
	}
	/**
	 *  
	 * @param $url string SCRIPT_URL
	 */
	private function setPaths( $url ) {
	    // find request path
	    $path = str_replace(preg_replace('/\/api(\.v[0-9]{1,2}-[0-9]{1,2})?.php/','',$_SERVER['SCRIPT_NAME']),'',$url);
	    //print $_SERVER['SCRIPT_URL'];exit;
		// remove prefix api/v? in request path
		$path_info = preg_replace('/\/api(\/v[0-9]{1,2}\.[0-9]{1,2})?/','',$path);
		$this->_container['PATH_INFO'] = $path_info;
		preg_match('/\/api(\/v[0-9]{1,2}\.[0-9]{1,2})?/',$path,$matches);
		// save api version
		$this->_container['API_VERSION'] = isset( $matches[0] ) ? $matches[0] : "api";
	}
	
	public static function getInstance(){
		if(!static::$instance) {
			static::$instance = new \App();
		}
		return static::$instance;
	}
	
	public function resetPaths( $url = FALSE ) {
	    $this->setPaths( $url ? $url : $_SERVER['SCRIPT_URL'] );
	}
	
	public function resetAll( $url = FALSE ) {
	    $this->founded = FALSE;
	    $this->setPaths( $url ? $url : $_SERVER['SCRIPT_URL'] );
	}
	/** not use */
	public function isFounded() {
	    return $this->founded;
	}
	
	// router
	public function get($pattern) {
		$args = func_get_args();
		array_shift($args);
		$this->_route('GET',$pattern,$args);
	}
	
	public function delete($pattern) {
		$args = func_get_args();
		array_shift($args);
		$this->_route('DELETE',$pattern,$args);
	}
	
	public function post($pattern) {
		$args = func_get_args();
		array_shift($args);
		$this->_route('POST',$pattern,$args);
	}
	
	public function put($pattern) {
		$args = func_get_args();
		array_shift($args);
		$this->_route('PUT',$pattern,$args);
	}
	
	public function patch($pattern) {
		$args = func_get_args();
		array_shift($args);
		$this->_route('PATCH',$pattern,$args);
	}
	
	private function _route($method,$pattern,$fn) {
	    //if( $this->founded === TRUE ) return;
		//assert method
		if ( ($_SERVER['REQUEST_METHOD'] == $method && !isset($_SERVER["HTTP_X_HTTP_METHOD_OVERRIDE"] ) ) || 
			( isset($_SERVER["HTTP_X_HTTP_METHOD_OVERRIDE"]) && $_SERVER["HTTP_X_HTTP_METHOD_OVERRIDE"] == $method ) ) { 
			
			$this->founded = TRUE;
			
			// convert URL parameters (":p", "*") to regular expression
			//$regex = str_replace(['*','(',')',':p'],['[^/]+','(?:',')?','([^/]+)'],$pattern);
			
			$regex = preg_replace('#:([\w]+)#', '(?<\\1>[^/]+)',str_replace(['*', ')'],['[^/]+', ')?'],$pattern));
			if (substr($pattern,-1)==='/') $regex .= '?';
			if (!preg_match('#^'.$regex.'$#', $this->PATH_INFO, $values)) {
				return;
			}
			preg_match_all('#:([\w]+)#', $pattern, $params, PREG_PATTERN_ORDER);
			$args = [];
			foreach ($params[1] as $param) {
				if (isset($values[$param])) $args[] = urldecode(preg_replace ("/[^a-zA-ZА-ЯЁа-яё0-9\-]/", "", $values[$param]));
			}
			$this->_exec($fn,$args);
		} else return;
	}
	
	public function matchAll( $pattern, $url ) {
	    preg_match( '/\/web\/api(\/v[0-9]{1,2}\.[0-9]{1,2})?(\/.+)/', $url["path"], $matches );
	    if( !isset( $matches[2] ) ) return NULL;
	    $regex = preg_replace( '#:([\w]+)#', '(?<\\1>[^/]+)', str_replace( ['*', ')'], ['[^/]+', ')?'], $pattern ) );
		if ( substr( $pattern, -1 ) === '/' ) $regex .= '?';
		if ( !preg_match('#^'.$regex.'$#', $matches[2], $values ) ) {
			return NULL;
		}
		preg_match_all('#:([\w]+)#', $pattern, $params, PREG_PATTERN_ORDER);
		$args = [];
		foreach ($params[1] as $param) {
			if (isset($values[$param])) $args[] = urldecode(preg_replace ("/[^a-zA-ZА-ЯЁа-яё0-9\-]/", "", $values[$param]));
		}
		return $args;
	}
	
	public function handleOutput( $res ) {
	    ob_start();
        echo($res->toXmlStr());
        $handle=tmpfile();
        $content = ob_get_contents();
        fwrite($handle,$content);//сохраняем весь вывод в реальный файл
        fseek($handle,0);//перематываем на начало файла
        ob_end_clean();
        return $handle;
	}
	
	private function _exec(&$fn,&$args) {
		foreach ((array)$fn as $cb) {
			if(is_object($cb) && method_exists($cb,'__invoke')) {
				call_user_func_array($cb,$args);
			}else if( strstr( "::", $cb ) ) {
				call_user_func_array(array($cb),$args);
			} else {
				$fn = explode(':',$cb);
				$obj = new $fn[0]();
				call_user_func_array(array(&$obj,$fn[1]),$args);
			}
		}
	}
	// service&params container
	private function _get($id) {
		if(isset($this->_container[$id])) {
			$isInvokable = is_object($this->_container[$id]) && method_exists($this->_container[$id], '__invoke');
			return $isInvokable ? $this->_container[$id]($this) : $this->_container[$id];
		}
	}
	
	private function _set($id,$val) {
		$this->_container[$id] = $val;
	}

    public function fn($id) {
        if(isset($this->_container[$id])) {
            $isInvokable = is_object($this->_container[$id]) && method_exists($this->_container[$id], '__invoke');
            if($isInvokable) return $this->_container[$id];
        }
    }

	public function once($id, $value){
		$this->_set($id, function () use ($value) {
			static $object;
			if (null === $object) {
				$object = $value();
			}
			return $object;
		});
	}
	
	public function locate() {
	    $args = func_get_args();
		$id = array_shift($args);
	    if(isset($this->_container[$id])) {
			$isInvokable = is_object($this->_container[$id]) && method_exists($this->_container[$id], '__invoke');
			return $isInvokable ? call_user_func_array($this->_container[$id],$args) : $this->_container[$id];
		}
	}
	
	// helpers
	/**
	 *
	 * Парсим заголовок HTTP_ACCEPT для того, чтобы определить тип содержимого
	 */
	public function __get($id) {
		return $this->_get($id);
	}
	
	public function __set($id,$val) {
		return $this->_set($id,$val);
	}
	private function _accept() {
		$json = $xml = 0;
		
		$parts = preg_split('/\s*(?:,*("[^"]+"),*|,*(\'[^\']+\'),*|,+)\s*/', $_SERVER["HTTP_ACCEPT"], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE );
		foreach ($parts as $part) {
			$quality = 1.0;
			$params = preg_split('/;\s*q=/i', $part, 0, PREG_SPLIT_NO_EMPTY);
			if(count($params)==1) {
				$params[] = $quality;
			}
			if( strpos( $params[0], "/xml" ) !== FALSE ) {
				$xml = (float) $params[1];
			} elseif( strpos($params[0], "/json" ) !== FALSE ) {
				$json = (float) $params[1];
			}
		}
		if( $xml === 0 && $json === 0 ) return null;
		else return $xml > $json ? "xml" : "json";
	}
	/**
	 * Обрабатываем входящий запрос
	 *
	 */
	public function request( \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType $adaptor = null ) {
		if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
			if (!isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
				$GLOBALS["HTTP_RAW_POST_DATA"] = file_get_contents("php://input");
			}
			if( $adaptor && array_key_exists("CONTENT_TYPE", $_SERVER) &&
				strpos($_SERVER["CONTENT_TYPE"], "/xml") !== FALSE ) {
				// todo: Можно проверить на соответствие схемы, хотя можно проверять через валидатор объекта
				$adaptor->fromXmlStr( $GLOBALS["HTTP_RAW_POST_DATA"] );
				$this->REQUEST = $adaptor;
			} else if( $adaptor && array_key_exists("CONTENT_TYPE", $_SERVER) &&
				strpos($_SERVER["CONTENT_TYPE"], "/json") !== FALSE ) {
				if( $json = json_decode( $GLOBALS["HTTP_RAW_POST_DATA"] ) ) {
					$adaptor->fromJSON( json_decode( $GLOBALS["HTTP_RAW_POST_DATA"] ) );
					$this->REQUEST = $adaptor;
				} else $this->throwError( new \Exception( "JSON data error", 450 ) );
			} else {
				$this->REQUEST = $_POST;
			}
			$GLOBALS["HTTP_RAW_POST_DATA"] = NULL;
		}
		$this->QUERY = $_GET;
		return $this->REQUEST;
	}
	/**
	 * Подготовка ответа
	 *
	 * @param $obj \Happymeal\Port\Adaptor\Data\XML\Schema\AnyType Сериализуемый объект
	 * @param $pref вручную устанавливаемый тип контента
	 */
	public function response( \Happymeal\Port\Adaptor\Data\XML\Schema\AnyType $obj, $pref = NULL ) {
		$mode = $pref ? $pref : $this->_accept();
		switch( $mode ) {
			case "json":
				header( "Content-type: application/json; charset: utf-8" );
				echo $obj->toJSON();
				break;
			default:
			    //$this->locate( "RESPONSE_ADAPTOR", $obj->toXmlStr(), true );
			    header( "Content-type: application/xml; charset: utf-8" );
				echo $obj->toXmlStr();
		}
		exit;
    }
    /**
     *
     *
     *
     */
    public function responseHTML( \Happymeal\Port\Adaptor\Data\XML\Schema\AnyType $obj ) {
        $output = "html";
        if( isset( $_SERVER["HTTP_ACCEPT"] ) ) {
            if( strpos( $_SERVER["HTTP_ACCEPT"], "/json" ) !== FALSE ) {
                $output = "json";
            } else if ( strpos( $_SERVER["HTTP_ACCEPT"], "/xml" ) !== FALSE && strpos( $_SERVER["HTTP_ACCEPT"], "text/html" ) === FALSE  ) {
                $output = "xml";
            }
        }
        header("Vary: Accept");
        switch( $output ) {
			case "json":
				header( "Content-type: application/json; charset: utf-8" );
                echo $obj->toJSON();
                exit;
			case "xml":
			    //$this->locate( "RESPONSE_ADAPTOR", $obj->toXmlStr(), true );
			    header( "Content-type: application/xml; charset: utf-8" );
                echo $obj->toXmlStr();
                exit;
            default:
                header("Content-type: text/html; charset=UTF-8");
                if(!$obj->getPI()) $obj->setPI("/stylesheets/xml2html.xsl");
                echo(\Happymeal\Port\Adaptor\Data\Xml2Html::transform($obj->toXmlStr(),$this->fn("REF")));
                exit;
		}
    }
	/**
	 * https://svn.net.ilb.ru/viewvc/phplib/bb/HTTP/Request2Xml.php
	 * Подчищает входные данные - лишние пробелы, переносы и пр.
	 * @param string $value
	 * @param array $replace_pairs массив замен символов, передать array() чтобы отключить замену
	 * @return string
	 */
	private function cleanup($value, $replace_pairs = NULL) {
		$replace_pairs = ($replace_pairs !== NULL) ? $replace_pairs : $this->$default_replace_pairs;
		return trim(strtr($value, $replace_pairs));
	}
	
	public function throwError(\Exception $e) {
		switch($e->getCode()) {
			case 404:
				header('HTTP/1.0 404 Not Found');
				echo "<h1>Error 404 Not Found</h1>";
				echo "<p>The resource '".$this->PATH_INFO."' could not be found.</p>";
				break;
			case 450:
				header('HTTP/1.0 400 Bad Request');
				echo "<p>".$e->getMessage()."</p>";
				break;
			default:
				error_log($e->getLine().":".$e->getFile()." ".$e->getMessage());
				throw new \Exception($e->getMessage(), $e->getCode());
		}
		exit;
	}
	//cache
	//http://habrahabr.ru/post/44906/
	//http://www.exlab.net/dev/http-caching.html
    function cacheControl( $lastmod, $expr = NULL ) {
        if( $this->CACHED !== TRUE ) return;
		$etag = $lastmod;
		$expr = $expr ? $expr : 60 * 60 * 24 * 7;
		$gmtime = gmdate( "D, d M Y H:i:s", $lastmod ) . " GMT";
		header( "ETag: " . $etag );
		header( "Last-Modified: " . $gmtime );
		header( "Vary: Accept" );
		header( "Cache-Control: " );
		header( "Pragma: " );
        header( "Expires: " );
        return;
		if( isset( $_SERVER["HTTP_IF_MODIFIED_SINCE"] ) && isset( $_SERVER["HTTP_IF_NONE_MATCH"] ) ) {
			$if_modified_since = preg_replace("/;.*$/", "", $_SERVER["HTTP_IF_MODIFIED_SINCE"]);
			if( trim( $_SERVER["HTTP_IF_NONE_MATCH"] ) == $etag && $if_modified_since == $gmtime ) {
				header("HTTP/1.0 304 Not modified");
				header("Expires: max-age={$expr}, must-revalidate");
				exit;
			}
		}
	}
}
