<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class NonNegativeIntegerTypeValidator extends IntegerTypeValidator 
{

	const MININCLUSIVE = 0;
	
	public function __construct ( NegativeIntegerType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMinInclusive( $this->tdo->__text(), $this::MININCLUSIVE );
	}

}
