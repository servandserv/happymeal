<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class NCNameTypeValidator extends NameTypeValidator 
{
	public function __construct ( NCNameType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}
}
