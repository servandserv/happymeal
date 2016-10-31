<?php

namespace com\happymeal\XML\Schema;

class NameValidator extends TokenValidator {

	const PATTERN = "/^[_:A-Za-z][-.:\w]+$/";
	
	public function __construct ( \com\happymeal\XML\Schema\Name $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validateType () {
		parent::validate();
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
