<?php

namespace com\servandserv\happymeal\XML\Schema;

class NormalizedStringTypeValidator extends StringTypeValidator 
{

	const WHITESPACE = "replace";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\NormalizedStringType $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}