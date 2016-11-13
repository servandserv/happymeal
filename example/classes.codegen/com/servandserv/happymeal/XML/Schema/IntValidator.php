<?php

namespace com\servandserv\happymeal\XML\Schema;

class IntValidator extends LongValidator 
{

	const MININCLUSIVE = -2147483648;
	const MAXINCLUSIVE = 2147483647;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Int $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
		$this->assertMinInclusive( $this->tdo->__text(), $this::MININCLUSIVE );
	}
}
