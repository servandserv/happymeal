<?php

namespace com\happymeal\XML\Schema;

class NonPositiveIntegerValidator extends IntegerValidator {

	const MAXINCLUSIVE = 0;
	
	public function __construct ( \com\happymeal\XML\Schema\NonPositiveInteger $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->_text(), $this::MAXINCLUSIVE );
	}

}
