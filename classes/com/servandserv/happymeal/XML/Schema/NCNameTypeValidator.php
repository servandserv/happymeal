<?php

namespace com\servandserv\happymeal\XML\Schema;

class NCNameTypeValidator extends NameTypeValidator 
{

	public function __construct ( \com\servandserv\happymeal\XML\Schema\NCNameType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

}
