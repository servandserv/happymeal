<?php

namespace com\servandserv\happymeal\WADL;

use \com\servandserv\happymeal\XML\Schema\AnyType;

class ClientAdapter
{
    
    const _200 = " 200 OK";
    const _204 = " 204 No Content";
    const _400 = " 400 Bad Request";
    const _403 = " 403 Forbidden";
    const _405 = " 405 Method Not Allowed";
    const _500 = " 500 Internal Server Error";
    
    protected $reqXML;
    protected $reqJSON;
    protected $reqArray;
    protected $response;
    
    public static function create( array $conf )
    {   
        $cli =  new self();
        foreach( $conf as $name=>$method ) {
            if( strtolower( $name ) === strtolower( $_SERVER["REQUEST_METHOD"] ) ) {
                if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
			        if ( !isset($GLOBALS["HTTP_RAW_POST_DATA"] ) ) {
				        $GLOBALS["HTTP_RAW_POST_DATA"] = file_get_contents( "php://input" );
			        }
			        if( array_key_exists("CONTENT_TYPE", $_SERVER ) &&
				        strpos($_SERVER["CONTENT_TYPE"], "/xml") !== FALSE ) {
				        $xr = new \XMLReader();
				        if( $xr->XML( $GLOBALS["HTTP_RAW_POST_DATA"] ) ) {
				            $cli->reqXML = $xr;
				        } else $cli->throwException( "Error on XML request decode", 400 );
			        } else if( array_key_exists("CONTENT_TYPE", $_SERVER) &&
				        strpos( $_SERVER["CONTENT_TYPE"], "/json" ) !== FALSE ) {
				        if( $json = json_decode( $GLOBALS["HTTP_RAW_POST_DATA"], TRUE ) ) {
				            $cli->reqJSON = $json;
				        } else $cli->throwException( "Error on JSON request decode", 400 );
			        } else {
			            $cli->reqArray = $_POST;
			        }
			        $GLOBALS["HTTP_RAW_POST_DATA"] = NULL;
		        } else {
		            $cli->reqArray = $_GET;
		        }
		        $media = FALSE;
		        if( isset( $method["request"] ) && isset( $method["request"]["representation"] ) ) {
		            foreach( $method["request"]["representation"] as $mediaType ) {
		                if( $cli->reqXML !== NULL && strpos( $mediaType[0], "/xml" ) )  $media = TRUE;
		                if( $cli->reqJSON !== NULL && strpos( $mediaType[0], "/json" ) )  $media = TRUE;
		            }
		        } else if( $cli->reqArray !== NULL ) $media = TRUE;
		        if( !$media ) $cli->throwException( "Unsupported Media Type", 415 );
		        
                $cli->response = $method["response"];
                
                return $cli;
            }
        }
        $cli->throwException( "Method '" . $_SERVER["REQUEST_METHOD"] . "' not allowed expected '" . implode( ",", array_keys( $conf ) ) . "'", 405 );
    }
    
    public function request( AnyType $dto )
    {
        if( $this->reqXML !== NULL ) return $dto->fromXmlReader( $this->reqXML );
        else if( $this->reqJSON !== NULL ) return $dto->fromJSONArray( $this->reqJSON );
        else return $dto->fromMarkupArray( $this->reqArray );
    }
    
    public function response( AnyType $adapter = NULL, $code = 200 )
    {
        if( $adapter === NULL ) {
            header( $this->responseHeader( 204 ) );
        } else {
            header( $this->responseHeader( $code ) );
		    switch( $this->accept() ) {
			    case "json":
				    header( "Content-type: application/json; charset: utf-8" );
				    echo $adapter->toJSON();
				    break;
			    default:
			        header( "Content-type: application/xml; charset: utf-8" );
				    echo $adapter->toXmlStr();
		    }
		}
		exit;
    }
    
    public function throwException( $message, $code )
    {
        header( $this->responseHeader( $code ) );
        echo $this->responseHeader( $code ) . ": " . $message;
        exit;
    }
    
    private function accept() {
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
	
	private function responseHeader( $code )
	{
	    return $_SERVER["SERVER_PROTOCOL"] ." ". $code;
	}
}