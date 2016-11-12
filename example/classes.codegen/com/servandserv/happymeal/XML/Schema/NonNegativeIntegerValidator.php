<?php

namespace com\servandserv\happymeal\XML\Schema;

class NonNegativeIntegerValidator extends IntegerValidator 
{

	const MININCLUSIVE = 0;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\NegativeInteger $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMinInclusive( $this->tdo->_text(), $this::MININCLUSIVE );
	}

}
