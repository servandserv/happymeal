<?php

namespace com\servandserv\happymeal\WADL\Infrastructure;

use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\WADL\Application\ClientResponsePort;
use \com\servandserv\happymeal\WADL\Application\Headers;

class ClientResponseAdapter implements ClientResponsePort
{
    private $code;

    public function __construct( $code = Headers::_200 )
    {
        $this->code = $code;
    }
    
    public function response( AnyType $adapter = NULL )
    {
        if( $adapter === NULL ) {
            header( $this->responseHeader( Headers::_204 ) );
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