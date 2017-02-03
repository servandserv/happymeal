<?php

namespace com\servandserv\happymeal\WADL;

use \com\servandserv\happymeal\XML\Schema\AnyType;

interface Router
{
    /**
     * @return boolean TRUE if redirect header has been sent
     */
    public function redirect( AnyType $result = null );
}
