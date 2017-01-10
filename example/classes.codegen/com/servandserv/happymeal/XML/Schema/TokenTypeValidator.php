<?php

namespace com\servandserv\happymeal\XML\Schema;

class TokenTypeValidator extends NormalizedStringTypeValidator 
{

	const WHITESPACE = "collapse";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\TokenType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
