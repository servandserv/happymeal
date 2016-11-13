<?php

namespace com\servandserv\happymeal\XML\Schema;

class ShortValidator extends IntValidator 
{

	const MININCLUSIVE = -32768;
	const MAXINCLUSIVE = 32767;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Short $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
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
