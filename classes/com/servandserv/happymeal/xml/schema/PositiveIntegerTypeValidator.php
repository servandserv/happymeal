<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class PositiveIntegerTypeValidator extends NonNegativeIntegerTypeValidator 
{

	const MININCLUSIVE = 1;
	
	public function __construct ( PositiveIntegerType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
	}

}
