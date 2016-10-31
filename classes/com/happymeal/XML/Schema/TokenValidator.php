<?php

namespace com\happymeal\XML\Schema;

class TokenValidator extends NormalizedStringValidator {

	const WHITESPACE = "collapse";
	
	public function __construct ( \com\happymeal\XML\Schema\Token $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

}
