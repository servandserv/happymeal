<?php

namespace com\happymeal\XML\Schema;

class ByteValidator extends ShortValidator {

	const MININCLUSIVE = -128;
	const MAXINCLUSIVE = 127;
	
	public function __construct ( \com\happymeal\XML\Schema\Byte $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->_text(), $this::MAXINCLUSIVE );
		$this->assertMinInclusive( $this->tdo->_text(), $this::MININCLUSIVE );
	}

}
