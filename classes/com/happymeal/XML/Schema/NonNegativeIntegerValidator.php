<?php

namespace com\happymeal\XML\Schema;

class NonNegativeIntegerValidator extends IntegerValidator {

	const MININCLUSIVE = 0;
	
	public function __construct ( \com\happymeal\XML\Schema\NegativeInteger $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertMinInclusive( $this->tdo->_text(), $this::MININCLUSIVE );
	}

}
