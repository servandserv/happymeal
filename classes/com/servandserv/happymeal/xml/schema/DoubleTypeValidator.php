<?php

namespace com\servandserv\happymeal\xml\schema;

class DoubleTypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	const PATTERN = "/^([-+]?[0-9]*\.?[0-9]+((e|E)-?[0-9]+)?|NaN|-INF|INF)$/";
	//const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	
	public function __construct ( \com\servandserv\happymeal\xml\schema\DoubleType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
