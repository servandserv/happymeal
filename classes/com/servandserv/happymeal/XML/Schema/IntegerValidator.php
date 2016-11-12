<?php

namespace com\servandserv\happymeal\XML\Schema;

class IntegerValidator extends DecimalValidator 
{

	//const PATTERN = "/[\-+]?[0-9]+/";
	const FRACTIONDIGITS = "0";
	const PATTERN = "/^[\-+]?[0-9]+$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Integer $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}
	
}
