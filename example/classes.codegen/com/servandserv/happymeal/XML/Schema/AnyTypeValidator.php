<?php

namespace com\servandserv\happymeal\XML\Schema;

class AnyTypeValidator extends \com\servandserv\happymeal\Validator 
{
	public function __construct ( \com\servandserv\happymeal\XML\Schema\AnyType $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) {
		$this->tdo = $tdo;
		parent::__construct( $handler );
	}

	public function validate () {}
	
}