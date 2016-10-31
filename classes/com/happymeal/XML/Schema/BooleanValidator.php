<?php

namespace com\happymeal\XML\Schema;

const WHITESPACE = "collapse";

class BooleanValidator extends \com\happymeal\XML\Schema\AnySimpleTypeValidator {

	public function __construct ( \com\happymeal\XML\Schema\Boolean $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		$this->assertBoolean( $this->tdo->_text() );
	}
	
	private function assertBoolean( $value ) {
		if( is_bool( $value) && !in_array( $value, array( "0", "1", "true", "false" ) ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_BOOLEAN)
			    ->setValue($value));
		}
	}

}
