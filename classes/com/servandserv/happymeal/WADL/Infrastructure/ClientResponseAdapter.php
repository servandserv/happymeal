<?php

namespace com\servandserv\happymeal\WADL\Infrastructure;

use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\WADL\Application\ClientResponsePort;

class ClientResponseAdapter implements ClientResponsePort
{

    const _200 = " 200 OK";
    const _204 = " 204 No Content";
    const _400 = " 400 Bad Request";
    const _403 = " 403 Forbidden";
    const _405 = " 405 Method Not Allowed";
    const _500 = " 500 Internal Server Error";

    private $code;

    public function __construct( $code = self::_200 )
    {
        $this->code = $code;
    }
    
    public function response( AnyType $adapter = NULL )
    {
        if( $adapter === NULL ) {
            header( $this->responseHeader( self::_204 ) );
        } else {
            header( $this->responseHeader( $this->code ) );
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
    public function throwException( $message )
    {
        header( $this->responseHeader( $this->code ) );
        echo $this->responseHeader( $this->code ) . ": " . $message;
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
	    return $_SERVER["SERVER_PROTOCOL"] . $code;
	}
}