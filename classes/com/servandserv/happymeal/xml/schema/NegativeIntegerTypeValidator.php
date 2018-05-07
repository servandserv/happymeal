<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class NegativeIntegerTypeValidator extends NonPositiveIntegerTypeValidator 
{

	const MAXINCLUSIVE = -1;
	
	public function __construct ( NegativeIntegerType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
	}

}
