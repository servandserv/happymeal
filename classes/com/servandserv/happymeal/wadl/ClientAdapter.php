<?php

namespace com\servandserv\happymeal\wadl;

use \com\servandserv\happymeal\xml\schema\AnyType;

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
    protected $request;
    protected $router;

    public static function create( array $conf, Router $router = NULL )
    {
        $cli = new self();
        $cli->router = $router;
        $rm = $_SERVER["REQUEST_METHOD"]; // request method
        foreach( $conf as $name => $method ) {
            if( strtolower( $name ) !== strtolower( $rm ) ) {
                continue;
            }
            if( strtoupper( $rm ) === "POST" ) {
                if( !isset( $GLOBALS["HTTP_RAW_POST_DATA"] ) ) {
                    $GLOBALS["HTTP_RAW_POST_DATA"] = file_get_contents( "php://input" );
                }
                if( array_key_exists( "CONTENT_TYPE", $_SERVER ) &&
                    strpos( $_SERVER["CONTENT_TYPE"], "/xml" ) !== FALSE ) {
                    $xr = new \XMLReader();
                    if( $xr->XML( $GLOBALS["HTTP_RAW_POST_DATA"] ) ) {
                        try {
                            new \SimpleXMLElement( $GLOBALS["HTTP_RAW_POST_DATA"] );
                            $cli->reqXML = $xr;
                        } catch ( \Exception $e ) {
                            $cli->throwException( "Error on XML format", 400 );
                        } 
                    } else $cli->throwException( "Error on XML request decode", 400 );
                } else if( array_key_exists( "CONTENT_TYPE", $_SERVER ) &&
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
                    if( $cli->reqXML !== NULL && strpos( $mediaType[0], "/xml" ) ) $media = TRUE;
                    if( $cli->reqJSON !== NULL && strpos( $mediaType[0], "/json" ) ) $media = TRUE;
                }
            } else if( $cli->reqArray !== NULL ) $media = TRUE;

            if( !$media ) $cli->throwException( "Unsupported Media Type", 415 );

            $cli->response = isset( $method["response"] ) ? $methos["response"] : [];

            return $cli;
        }
        $cli->throwException( "Method '".$rm."' not allowed expected '".implode( ",", array_keys( $conf ) )."'", 405 );
    }

    public function request( AnyType $dto )
    {
        $this->request;
        if( $this->reqXML !== NULL ) {
            $this->request = $dto->fromXmlReader( $this->reqXML );
        } else if( $this->reqJSON !== NULL ) {
            $this->request = $dto->fromJSONArray( $this->reqJSON );
        } else {
            $this->request = $dto->fromMarkupArray( $this->reqArray );
        }
        return $this->request;
    }

    public function response( AnyType $response = NULL, $code = 200, $pi = NULL )
    {
        if( $this->router && $this->router->redirect( $this->request, $response ) ) return;
        if( $response === NULL ) {
            header( $this->responseHeader( 204 ) );
        } else {
            header( $this->responseHeader( $code ) );
            switch( $this->accept() ) {
                case "json":
                    header( "Content-type: application/json;charset=UTF-8" );
                    echo $response->toJSON();
                    break;
                default:
                    header( "Content-type: application/xml;charset=UTF-8" );
                    echo $response->toXmlStr( $response::NS, $response::ROOT, $pi );
            }
        }
    }

    public function throwException( $message, $code )
    {
        header( $this->responseHeader( $code ) );
        echo $this->responseHeader( $code ).": ".$message;
        exit;
    }

    private function accept()
    {
        if( !isset( $_SERVER["HTTP_ACCEPT"] ) ) return "xml";
        $json = $xml = 0;

        $parts = preg_split( '/\s*(?:,*("[^"]+"),*|,*(\'[^\']+\'),*|,+)\s*/',
            $_SERVER["HTTP_ACCEPT"], 0,
            PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE );
        foreach( $parts as $part ) {
            $quality = 1.0;
            $params = preg_split( '/;\s*q=/i', $part, 0, PREG_SPLIT_NO_EMPTY );
            if( count( $params ) == 1 ) {
                $params[] = $quality;
            }
            if( strpos( $params[0], "/xml" ) !== FALSE ) {
                $xml = ( float ) $params[1];
            } elseif( strpos( $params[0], "/json" ) !== FALSE ) {
                $json = ( float ) $params[1];
            }
        }
        if( $xml === 0 && $json === 0 ) {
            return null;
        } else {
            return $xml > $json ? "xml" : "json";
        }
    }

    private function responseHeader( $code )
    {
        return ( isset( $_SERVER["SERVER_PROTOCOL"] ) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.1" )." ".$code;
    }

}
