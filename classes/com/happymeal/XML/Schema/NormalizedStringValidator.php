<?php

namespace com\happymeal\XML\Schema;

class NormalizedStringValidator extends StringValidator {

	const WHITESPACE = "replace";
	
	public function __construct ( \com\happymeal\XML\Schema\String $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

}