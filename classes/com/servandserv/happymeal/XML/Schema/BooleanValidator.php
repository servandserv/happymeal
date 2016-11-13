<?php

namespace com\servandserv\happymeal\XML\Schema;

const WHITESPACE = "collapse";

use \com\servandserv\happymeal\errors\Error;
use \com\servandserv\happymeal\Bindings;

class BooleanValidator extends \com\servandserv\happymeal\XML\Schema\AnySimpleTypeValidator 
{

	public function __construct ( \com\servandserv\happymeal\XML\Schema\Boolean $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
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
			   ->setName($this->className)
			   ->setRule(self::ASSERT_BOOLEAN)
			   ->setValue($value));
		}
	}

}
