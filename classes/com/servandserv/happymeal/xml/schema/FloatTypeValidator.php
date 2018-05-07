<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class FloatTypeValidator extends AnySimpleTypeValidator 
{

	const WHITESPACE = "collapse";
	//const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";
	const PATTERN = "/^([-+]?[0-9]*\.?[0-9]+((e|E)-?[0-9]+)?|NaN|-INF|INF)$/";
	
	public function __construct ( FloatType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
