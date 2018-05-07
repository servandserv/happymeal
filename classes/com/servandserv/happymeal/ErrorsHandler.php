<?php

namespace com\servandserv\happymeal;

use \com\servandserv\data\happymeal\Error;

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

	public function handleError ( Error $err ) 
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
		$this->errors = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\data\happymeal\Errors' );
	}
	
}
