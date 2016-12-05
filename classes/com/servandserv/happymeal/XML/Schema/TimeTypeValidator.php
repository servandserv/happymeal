<?php

namespace com\servandserv\happymeal\XML\Schema;

class TimeTypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	const PATTERN = "/^([01][0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\TimeType $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
