<?php

namespace com\servandserv\happymeal\WADL\Application;

use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\ErrorsHandler;

class RepresentationService implements MiddlewareService
{

    protected $req2type;
    protected $err2resp;
    protected $h;
    protected $resp;

    public function __construct( AnyTypeTranslator $req2type, AnyTypeTranslator $err2resp, ErrorsHandler $h, ClientResponsePort $resp )
    {
        $this->req2type = $req2type;
        $this->err2resp = $err2resp;
        $this->h = $h;
        $this->resp = $resp;
    }
    
    public function process( AnyType $adapter )
    {
        try {
            $this->req2type->translate( $adapter );
            $adapter->validateType( $this->h );
            if( $this->h->hasErrors() ) {
                $this->resp->response( $this->err2resp->translate( $this->h->getErrors() ) );
            }
        } catch( \Exception $e ) {
            $this->resp->throwException( $e->getMessage() );
        }
    }
}