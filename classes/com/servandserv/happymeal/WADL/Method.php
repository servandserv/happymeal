<?php

namespace \com\servandserv\happymeal\WADL

use \com\servandserv\happymeal\WADL\Request;
use \com\servandserv\happymeal\WADL\Response;

class Method
{
    private $name;
    private $request;
    private $responses;
    
    public function __construct($name)
    {
        $this->name=$name;
    }
    
    public function getRequest()
    {
        return $this->request;
    }
    
    public function setRequest( Request $req )
    {
        $this->request=$req;
        return $this;
    }
    
    public function getResponses()
    {
        return $this->responses;
    }
    
    public function getResponse($status)
    {
        return isset($this->responses[$status])?$this->responses[$status]:NULL;
    }
    
    public function setResponse(Response $resp)
    {
        $this->responses[$resp->getStatus()]=$resp;
        return $this;
    }
    
}