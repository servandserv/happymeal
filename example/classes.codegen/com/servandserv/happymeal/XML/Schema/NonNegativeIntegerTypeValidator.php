<?php

namespace com\servandserv\happymeal\XML\Schema;

class NonNegativeIntegerTypeValidator extends IntegerTypeValidator 
{

	const MININCLUSIVE = 0;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\NegativeIntegerType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMinInclusive( $this->tdo->__text(), $this::MININCLUSIVE );
	}

}
