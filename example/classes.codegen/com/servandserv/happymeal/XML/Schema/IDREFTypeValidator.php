<?php

namespace com\servandserv\happymeal\XML\Schema;

class IDREFTypeValidator extends NCNameTypeValidator 
{

	public function __construct ( \com\servandserv\happymeal\XML\Schema\IDREFType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
