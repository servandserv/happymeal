<?php

namespace com\happymeal\XML\Schema;

class DoubleValidator extends AnySimpleTypeValidator {

	const WHITESPACE = "collapse";
	const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	
	public function __construct ( \com\happymeal\XML\Schema\Double $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
