<?php

namespace com\servandserv\happymeal\XML\Schema;

class StringValidator extends AnySimpleTypeValidator 
{
	const WHITESPACE = "preserve";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\String $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
	}
	
}