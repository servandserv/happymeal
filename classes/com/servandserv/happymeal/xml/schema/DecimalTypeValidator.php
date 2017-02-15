<?php

namespace com\servandserv\happymeal\xml\schema;

class DecimalTypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	const PATTERN = "/^[-+]?[0-9]*\.?[0-9]+$/";
	//const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	
	public function __construct ( \com\servandserv\happymeal\xml\schema\DecimalType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
