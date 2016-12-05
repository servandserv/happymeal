<?php

namespace com\servandserv\happymeal\WADL\Application;

interface ClientRequestPort
{
    public function process( MiddlewareService $serv );
    public function request();
}
