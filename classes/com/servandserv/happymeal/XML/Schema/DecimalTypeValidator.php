<?php

namespace com\servandserv\happymeal\XML\Schema;

class DecimalTypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	const PATTERN = "/^[-+]?[0-9]*\.?[0-9]+$/";
	//const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\DecimalType $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
