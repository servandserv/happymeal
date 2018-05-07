<?php

namespace com\servandserv\happymeal\xml\schema;

const WHITESPACE = "collapse";

use \com\servandserv\happymeal\ErrorsHandler;
use \com\servandserv\happymeal\Bindings;

class BooleanTypeValidator extends AnySimpleTypeValidator 
{

	public function __construct ( BooleanType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		$this->assertBoolean( $this->tdo->__text() );
	}
	
	private function assertBoolean( $value ) 
	{
	    $normalized = $this->whitespace($value);
		if( is_bool($normalized) || in_array( $normalized, array( "0", "1", "true", "false" ) ) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
			   ->setTargetNS($this->targetNS)
			   ->setClassNS($this->classNS)
			   ->setName($this->nodeName)
			   ->setRule(self::ASSERT_BOOLEAN)
			   ->setValue($value));
	}

}
