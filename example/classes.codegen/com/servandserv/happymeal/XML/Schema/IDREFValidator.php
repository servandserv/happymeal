<?php

namespace com\servandserv\happymeal\XML\Schema;

class IDREFValidator extends NCNameValidator 
{

	public function __construct ( \com\servandserv\happymeal\XML\Schema\IDREF $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
