<?php

namespace com\servandserv\happymeal\XML\Schema;

class IDTypeValidator extends NCNameTypeValidator 
{

	public function __construct ( \com\servandserv\happymeal\XML\Schema\IDType $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
