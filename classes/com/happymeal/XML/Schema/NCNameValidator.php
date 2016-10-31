<?php

namespace com\happymeal\XML\Schema;

class NCNameValidator extends NameValidator {

	public function __construct ( \com\happymeal\XML\Schema\NCName $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

}
