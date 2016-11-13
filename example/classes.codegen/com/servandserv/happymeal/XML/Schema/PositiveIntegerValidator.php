<?php

namespace com\servandserv\happymeal\XML\Schema;

class PositiveIntegerValidator extends NonNegativeIntegerValidator 
{

	const MININCLUSIVE = 1;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\PositiveInteger $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
	}

}
