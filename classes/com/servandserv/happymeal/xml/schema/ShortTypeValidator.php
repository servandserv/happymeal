<?php

namespace com\servandserv\happymeal\xml\schema;

class ShortTypeValidator extends IntTypeValidator 
{

	const MININCLUSIVE = -32768;
	const MAXINCLUSIVE = 32767;
	
	public function __construct ( \com\servandserv\happymeal\xml\schema\ShortType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
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
