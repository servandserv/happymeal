<?php

namespace com\servandserv\happymeal\XML\Schema;

class AnyURITypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\AnyURIType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		
	}

}