<?php

namespace com\servandserv\happymeal\XML\Schema;

class DoubleTypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	const PATTERN = "/^([-+]?[0-9]*\.?[0-9]+((e|E)-?[0-9]+)?|NaN|-INF|INF)$/";
	//const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\DoubleType $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
