<?php

namespace com\servandserv\happymeal\wadl;

use \com\servandserv\happymeal\xml\schema\AnyType;

interface Router
{
    /**
     * @return boolean TRUE if redirect header has been sent
     */
    public function redirect( AnyType $result = null );
}
