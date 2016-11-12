<?php

namespace com\servandserv\happymeal\XML\Schema;

class NCNameValidator extends NameValidator 
{

	public function __construct ( \com\servandserv\happymeal\XML\Schema\NCName $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
