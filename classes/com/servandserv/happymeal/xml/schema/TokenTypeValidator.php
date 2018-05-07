<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class TokenTypeValidator extends NormalizedStringTypeValidator 
{

	const WHITESPACE = "collapse";
	
	public function __construct ( TokenType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
