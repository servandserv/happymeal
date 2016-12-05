<?php

namespace com\servandserv\happymeal\WADL\Application;

use \com\servandserv\happymeal\XML\Schema\AnyType;

interface AnyTypeTranslator
{
    public function translate( AnyType $adapter );
}