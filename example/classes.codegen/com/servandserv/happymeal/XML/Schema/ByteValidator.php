<?php

namespace com\servandserv\happymeal\XML\Schema;

class ByteValidator extends ShortValidator 
{

	const MININCLUSIVE = -128;
	const MAXINCLUSIVE = 127;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Byte $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
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
