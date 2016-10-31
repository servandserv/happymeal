<?php

namespace com\happymeal\XML\Schema;

class DurationValidator extends AnySimpleTypeValidator {

	const WHITESPACE = "collapse";
	const PATTERN = "/^([\-\+])?P(?:([0-9]+)Y)?(?:([0-9]+)M)?(?:([0-9]+)D)?(?:T(?:([0-9]+)H)?(?:([0-9]+)M)?(?:([0-9]+(?:\.[0-9]+)?)?S)?)$/";
	
	public function __construct ( \com\happymeal\XML\Schema\Duration $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
