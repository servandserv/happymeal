<?php

namespace com\servandserv\happymeal\WADL;

use \com\servandserv\happymeal\WADL\Representation;

class Request
{
    /**
     * @param array \com\servandserv\happymeal\WADL\Representation $rep
     */
    private $reps[];
    
    public function __construct()
    {
    }
    
    public function getRepresentations()
    {
        return $this->reps;
    }
    
    public function getRepresentation($mediaType)
    {
        return isset($this->reps[$mediaType])?$this->reps[$mediaType]:NULL;
    }
    
    public function setRepresentation( Representation $rep )
    {
        $this->reps[$rep->getMediaType()] = $rep;
        return $this;
    }
}