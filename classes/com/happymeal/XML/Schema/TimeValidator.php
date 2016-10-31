<?php

namespace com\happymeal\XML\Schema;

class TimeValidator extends AnySimpleTypeValidator {

	const WHITESPACE = "collapse";
	const PATTERN = "/^([01][0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/";
	
	public function __construct ( \com\happymeal\XML\Schema\Time $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
