<?php

namespace com\servandserv\happymeal\XML\Schema;

class NonPositiveIntegerValidator extends IntegerValidator 
{

	const MAXINCLUSIVE = 0;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\NonPositiveInteger $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
	}

}
