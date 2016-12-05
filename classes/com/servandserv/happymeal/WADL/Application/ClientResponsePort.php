<?php

namespace com\servandserv\happymeal\WADL\Application;

use \com\servandserv\happymeal\XML\Schema\AnyType;

interface ClientResponsePort
{
    public function response( AnyType $adapter );
    public function throwException( $message );
}