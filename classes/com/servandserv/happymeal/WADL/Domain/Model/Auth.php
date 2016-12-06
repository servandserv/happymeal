<?php

namespace com\servandserv\happymeal\WADL\Domain\Model;

class Auth
{
    protected $cn;
    protected $email;
    
    public function getCN() { return $this->cn; }
    public function setCN( $cn ) { $this->cn = $cn; return $this; }
    
    public function getEmail() { return $this->email; }
    public function setEmail( $email ) { $this->email = $email; return $this; }
}