<?php

namespace com\servandserv\happymeal\XML\Schema;

class IDValidator extends NCNameValidator 
{

	public function __construct ( \com\servandserv\happymeal\XML\Schema\ID $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
