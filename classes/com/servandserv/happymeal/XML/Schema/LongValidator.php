<?php

namespace com\servandserv\happymeal\XML\Schema;

class LongValidator extends IntegerValidator 
{

	const MININCLUSIVE = -9223372036854775808;
	const MAXINCLUSIVE = 9223372036854775807;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Long $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
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
