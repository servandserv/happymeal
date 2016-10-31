<?php

namespace com\happymeal\XML\Schema;

class LongValidator extends IntegerValidator {

	const MININCLUSIVE = -9223372036854775808;
	const MAXINCLUSIVE = 9223372036854775807;
	
	public function __construct ( \com\happymeal\XML\Schema\Long $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->_text(), $this::MAXINCLUSIVE );
		$this->assertMinInclusive( $this->tdo->_text(), $this::MININCLUSIVE );
	}

}
