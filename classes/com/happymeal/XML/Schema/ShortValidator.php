<?php

namespace com\happymeal\XML\Schema;

class ShortValidator extends IntValidator {

	const MININCLUSIVE = -32768;
	const MAXINCLUSIVE = 32767;
	
	public function __construct ( \com\happymeal\XML\Schema\Short $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->_text(), $this::MAXINCLUSIVE );
		$this->assertMinInclusive( $this->tdo->_text(), $this::MININCLUSIVE );
	}

}
