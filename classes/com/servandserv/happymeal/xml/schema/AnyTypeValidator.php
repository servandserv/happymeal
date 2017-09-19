<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\Validator;
use \com\servandserv\happymeal\ErrorsHandler;

class AnyTypeValidator extends Validator 
{
	public function __construct ( AnyType $tdo, ErrorsHandler $handler ) 
	{
		$this->tdo = $tdo;
		parent::__construct( $handler );
	}

	public function validate () {}
	
}