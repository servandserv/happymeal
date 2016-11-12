<?php

namespace \com\servandserv\happymeal\WADL;

class Resources
{
    protected $base;
    protected $resources;

    public function __construct($base)
    {
        $this->base = $base;
    }
    
    public function getResources()
    {
        return $this->resources;
    }
    
    public function getResource($path)
    {
        return isset($this->resources[$path])?$this->resources[$path]:NULL;
    }
    
    public function setResource(\com\servandserv\happymeal\WADL\Resource $res)
    {
        $this->resources[$res->getPath()] = $res->setPath($this->base.$res->getPath());
    }
    
}