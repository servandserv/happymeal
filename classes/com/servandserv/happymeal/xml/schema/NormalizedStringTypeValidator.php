<?php

namespace com\servandserv\happymeal\xml\schema;

class NormalizedStringTypeValidator extends StringTypeValidator 
{

	const WHITESPACE = "replace";
	
	public function __construct ( \com\servandserv\happymeal\xml\schema\NormalizedStringType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}