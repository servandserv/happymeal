<?php

namespace com\servandserv\happymeal;

/**
 * errors container
 */
class ErrorsHandler 
{

	private $errors;

	public function __construct () 
	{
		$this->clean();
	}

	public function handleError ( \com\servandserv\happymeal\Errors\Error $err ) 
	{
		$this->errors->setError( $err );
	}

	public function getErrors () 
	{
		return $this->errors;
	}
	
	public function hasErrors() 
	{
		return count( $this->errors->getError() ) > 0;
	}
	
	public function clean () 
	{
		$this->errors = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\Errors');
	}
	
}
