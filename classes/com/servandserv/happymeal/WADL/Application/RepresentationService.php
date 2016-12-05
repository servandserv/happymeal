<?php

namespace com\servandserv\happymeal\WADL\Application;

use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\ErrorsHandler;

class RepresentationService implements MiddlewareService
{

    protected $err2type;
    protected $resp;

    public function __construct( ErrorsTranslator $err2type, ClientResponsePort $resp )
    {
        $this->err2type = $err2type;
        $this->resp = $resp;
    }
    
    public function process( AnyType $adapter )
    {
        $req2type = new Request2AnyTypeTranslator();
        $handler = new ErrorsHandler();
        try {
            $req2type->translate( $adapter );
            $adapter->validateType( $handler );
            if( $handler->hasErrors() ) {
                $this->resp->response( $this->err2type->translate( $handler->getErrors() ) );
            }
        } catch( \Exception $e ) {
            $this->resp->throwException( $e->getMessage() );
        }
    }
}