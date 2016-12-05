<?php

namespace com\servandserv\happymeal\WADL\Infrastructure;

use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\WADL\Application\MiddlewareService;
use \com\servandserv\happymeal\WADL\Application\ClientRequestPort;

class ClientRequestAdapter implements ClientRequestPort
{

    protected $adapter;

    public function __construct( AnyType $adapter )
    {
        $this->adapter = $adapter;
    }

    public function process( MiddlewareService $serv )
    {
        $serv->process( $this->adapter );
        return $this;
    }
    
    public function request()
    {
		return $this->adapter;
	}
}