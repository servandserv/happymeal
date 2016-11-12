<?php

namespace com\servandserv\happymeal\XML\Schema;

class NegativeIntegerValidator extends NonPositiveIntegerValidator 
{

	const MAXINCLUSIVE = -1;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\NegativeInteger $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->_text(), $this::MAXINCLUSIVE );
	}

}
