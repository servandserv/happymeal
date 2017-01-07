<?php

namespace com\servandserv\happymeal\XML\Schema;

class ByteTypeValidator extends ShortTypeValidator 
{

	const MININCLUSIVE = -128;
	const MAXINCLUSIVE = 127;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\ByteType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
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
