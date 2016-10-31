<?php

namespace com\happymeal\XML\Schema;

class LanguageValidator extends TokenValidator {

	const PATTERN = "/[a-zA-Z]{1,8}(-[a-zA-Z0-9]{1,8})*/";
	
	public function __construct ( \com\happymeal\XML\Schema\Language $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
