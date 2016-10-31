<?php

namespace com\happymeal\XML\Schema;

class IDREFValidator extends NCNameValidator {

	public function __construct ( \com\happymeal\XML\Schema\IDREF $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

}
