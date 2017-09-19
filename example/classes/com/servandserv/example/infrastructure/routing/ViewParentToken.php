<?php

namespace com\servandserv\example\infrastructure\routing;

use \com\servandserv\happymeal\views\TokenType;
use \com\servandserv\happymeal\XML\Schema\AnyType;

class ViewParentToken extends TokenType
{

    public function redirect( AnyType $result )
    {
        header( "Location: ".$this->getRequest()->getUrl()."?__callback__=".$this->getId() );
        exit;
        //header( "Content-Type: application/xml" );
        //print $result->toXmlStr();
        //exit;
    }

}
