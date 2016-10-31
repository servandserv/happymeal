<?php

namespace com\happymeal\XML\Schema;

class DateValidator extends AnySimpleTypeValidator {

	const WHITESPACE = "collapse";
	const PATTERN = "/^(18|19|20)\d\d-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/";
	
	public function __construct ( \com\happymeal\XML\Schema\Date $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
