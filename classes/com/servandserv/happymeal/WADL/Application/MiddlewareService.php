<?php

namespace com\servandserv\happymeal\WADL\Application;

interface MiddlewareService
{


    /**
     * 
     * @param $adapter request data transfer object
     * @return NULL
     */
    public function process( \com\servandserv\happymeal\XML\Schema\AnyType $adapter );
}