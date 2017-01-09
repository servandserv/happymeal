<?php

namespace com\servandserv\happymeal\WADL;

use \com\servandserv\happymeal\XML\Schema\AnyType;

interface Router
{

    public function redirect( AnyType $result = null );
}
