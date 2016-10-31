<?php

namespace com\happymeal\XML\Schema;

class NMTOKENValidator extends TokenValidator {

	const PATTERN = "/[-\._:A-Za-z0-9]+/";
	
	public function __construct ( \com\happymeal\XML\Schema\NMTOKEN $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		parent::validate();
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
