<?php

namespace com\servandserv\happymeal\WADL\Application;

use \com\servandserv\happymeal\XML\Schema\AnyType;

class MethodService implements MiddlewareService
{

    protected $method;
    protected $resp;

    public function __construct( $method, ClientResponsePort $resp )
    {
        $this->method = $method;
        $this->resp = $resp;
    }
    
    public function process( AnyType $adapter )
    {
        if( strtolower( $this->method ) !== strtolower( $_SERVER["REQUEST_METHOD"] ) ) {
            $this->resp->throwException( "Method '" . $this->method . "' not allowed expected '" . $_SERVER["REQUEST_METHOD"] . "'" );
        }
    }
    
}