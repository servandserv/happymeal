<?php

namespace com\servandserv\happymeal\xml\schema;

class FloatTypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	//const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	const PATTERN = "/^([-+]?[0-9]*\.?[0-9]+((e|E)-?[0-9]+)?|NaN|-INF|INF)$/";
	
	public function __construct ( \com\servandserv\happymeal\xml\schema\FloatType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
