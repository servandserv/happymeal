<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class IntegerTypeValidator extends DecimalTypeValidator 
{

	//const PATTERN = "/[\-+]?[0-9]+/";
	const FRACTIONDIGITS = "0";
	const PATTERN = "/^[\-+]?[0-9]+$/";
	
	public function __construct ( IntegerType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}
	
}
