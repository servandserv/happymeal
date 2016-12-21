<?php

namespace com\servandserv\happymeal\XML\Schema;

class IntegerTypeValidator extends DecimalTypeValidator 
{

	//const PATTERN = "/[\-+]?[0-9]+/";
	const FRACTIONDIGITS = "0";
	const PATTERN = "/^[\-+]?[0-9]+$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\IntegerType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}
	
}
