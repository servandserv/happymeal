<?php

namespace com\servandserv\happymeal\XML\Schema;

class AnyURIValidator extends AnySimpleTypeValidator {

	const WHITESPACE = "collapse";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\AnyURI $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		
	}

}