<?php

namespace com\happymeal\XML\Schema;

class AnyURIValidator extends AnySimpleTypeValidator {

	const WHITESPACE = "collapse";
	
	public function __construct ( \com\happymeal\XML\Schema\AnyURI $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		
	}

}