<?php

namespace com\happymeal\XML\Schema;

class FloatValidator extends AnySimpleTypeValidator {

	const WHITESPACE = "collapse";
	const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	
	public function __construct ( \com\happymeal\XML\Schema\Float $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
