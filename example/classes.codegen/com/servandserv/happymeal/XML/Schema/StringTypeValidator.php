<?php

namespace com\servandserv\happymeal\XML\Schema;

class StringTypeValidator extends AnySimpleTypeValidator 
{
	const WHITESPACE = "preserve";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\StringType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
	}
	
}