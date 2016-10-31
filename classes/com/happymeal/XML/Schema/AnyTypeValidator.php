<?php

namespace com\happymeal\XML\Schema;

class AnyTypeValidator extends \com\happymeal\Validator 
{
	
	public function __construct ( \com\happymeal\XML\Schema\AnyType $tdo, \com\happymeal\ValidationHandler $handler ) {
		$this->tdo = $tdo;
		parent::__construct( $handler );
	}

	public function validate () {}
	
}