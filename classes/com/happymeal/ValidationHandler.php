<?php

namespace com\happymeal;

class ValidationHandler 
{

	private $errors;
	private $errLevel;

	public function __construct () 
	{
		$this->clean();
	}

	public function handleError ( \com\happymeal\Errors\Error $err ) 
	{
		$this->errors->setError( $err );
		if( $this->errLevel < $err->getCode() ) $this->errLevel = $err->getCode();
	}

	public function getErrors () 
	{
		return $this->errors;
	}
	
	public function hasErrors() 
	{
		return count( $this->errors ) > 0;
	}
	
	public function clean () 
	{
		$this->errors = new \com\happymeal\Errors();
		$this->errLevel = NULL;
	}
	
}
