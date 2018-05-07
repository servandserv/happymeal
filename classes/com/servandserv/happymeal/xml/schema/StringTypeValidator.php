<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class StringTypeValidator extends AnySimpleTypeValidator 
{
	const WHITESPACE = "preserve";
	
	public function __construct ( StringType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
	}
	
}