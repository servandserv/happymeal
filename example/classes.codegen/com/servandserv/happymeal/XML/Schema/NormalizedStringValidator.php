<?php

namespace com\servandserv\happymeal\XML\Schema;

class NormalizedStringValidator extends StringValidator 
{

	const WHITESPACE = "replace";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\String $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}