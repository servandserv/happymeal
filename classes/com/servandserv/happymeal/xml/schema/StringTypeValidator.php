<?php

namespace com\servandserv\happymeal\xml\schema;

class StringTypeValidator extends AnySimpleTypeValidator 
{
	const WHITESPACE = "preserve";
	
	public function __construct ( \com\servandserv\happymeal\xml\schema\StringType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
	}
	
}