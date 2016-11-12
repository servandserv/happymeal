<?php

namespace com\servandserv\happymeal\XML\Schema;

class TokenValidator extends NormalizedStringValidator 
{

	const WHITESPACE = "collapse";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Token $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
