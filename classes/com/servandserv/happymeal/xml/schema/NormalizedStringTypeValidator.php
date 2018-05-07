<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class NormalizedStringTypeValidator extends StringTypeValidator 
{

	const WHITESPACE = "replace";
	
	public function __construct ( NormalizedStringType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}