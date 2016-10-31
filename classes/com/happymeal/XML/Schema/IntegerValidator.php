<?php

namespace com\happymeal\XML\Schema;

class IntegerValidator extends DecimalValidator {

	const FRACTIONDIGITS = "0";
	const PATTERN = "/[\-+]?[0-9]+/";
	
	public function __construct ( \com\happymeal\XML\Schema\Integer $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}
	
}
