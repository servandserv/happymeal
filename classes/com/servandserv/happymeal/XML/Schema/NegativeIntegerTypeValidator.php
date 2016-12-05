<?php

namespace com\servandserv\happymeal\XML\Schema;

class NegativeIntegerTypeValidator extends NonPositiveIntegerTypeValidator 
{

	const MAXINCLUSIVE = -1;
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\NegativeIntegerType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
	}

}
