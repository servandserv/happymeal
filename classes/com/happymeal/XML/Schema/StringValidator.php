<?php

namespace com\happymeal\XML\Schema;

class StringValidator extends AnySimpleTypeValidator 
{
	const WHITESPACE = "preserve";
	
	public function __construct ( \com\happymeal\XML\Schema\String $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
	}
	
}