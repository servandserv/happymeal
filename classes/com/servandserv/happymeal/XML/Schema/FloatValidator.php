<?php

namespace com\servandserv\happymeal\XML\Schema;

class FloatValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	//const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	const PATTERN = "/^([-+]?[0-9]*\.?[0-9]+((e|E)-?[0-9]+)?|NaN|-INF|INF)$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Float $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
