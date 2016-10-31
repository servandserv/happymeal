<?php

namespace com\happymeal\XML\Schema;

class IDValidator extends NCNameValidator {

	public function __construct ( \com\happymeal\XML\Schema\ID $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

}
