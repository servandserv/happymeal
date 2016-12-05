<?php

namespace com\servandserv\happymeal\XML\Schema;

class LongTypeValidator extends IntegerTypeValidator 
{

	const MININCLUSIVE = -9223372036854775808;
	const MAXINCLUSIVE = 9223372036854775807;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\LongType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
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
