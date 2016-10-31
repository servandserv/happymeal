<?php

namespace com\happymeal\XML\Schema;

class AnySimpleTypeValidator extends AnyTypeValidator {

	const PATTERN = "";
	const MININCLUSIVE = 0;
	const MINEXCLUSIVE = 0;
	const MAXINCLUSIVE = 0;
	const MAXEXCLUSIVE = 0;
	const LENGTH = 0;
	const MINLENGTH = 0;
	const MAXLENGTH = 0;
	const WHITESPACE = "preserve";
	const FRACTIONDIGITS = 0;
	
	public function __construct ( \com\happymeal\XML\Schema\AnySimpleType $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		$this->assertSimple( $this->tdo->_text() );
	}

	protected function assertSimple( $value ) {
		if( $value !==NULL && ( is_object( $value ) || is_array( $value ) ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_SIMPLE)
			    ->setValue($value));
		}
	}
	
	protected function assertPattern( $value, $regexp = self::PATTERN ) {
		if ( $value!==NULL && !preg_match( $regexp, $value ) ){
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_PATTERN)
			    ->setValue($value));
		}
	}
	
	protected function assertMinInclusive( $value, $minInclusive = self::MININCLUSIVE ) {
		if( $value!==NULL && doubleval( $value ) < doubleval( $minInclusive ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MIN_INCLUSIVE)
			    ->setValue($value));
		}
	}
	
	protected function assertMinExclusive( $value, $minExclusive = self::MINEXCLUSIVE ) {
		if( $value!==NULL && doubleval( $value ) <= doubleval( $minExclusive ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MIN_EXCLUSIVE)
			    ->setValue($value));
		}
	}
	
	protected function assertMaxInclusive( $value, $maxInclusive = self::MAXINCLUSIVE ) {
		if( $value!==NULL && doubleval( $value ) > doubleval( $maxInclusive ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MAX_INCLUSIVE)
			    ->setValue($value));
		}
	}
	
	protected function assertMaxExclusive( $value, $maxExclusive = self::MAXEXCLUSIVE ) {
		if( $value!==NULL && doubleval( $value ) >= doubleval( $maxExclusive ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MAX_EXCLUSIVE)
			    ->setValue($value));
		}
	}
	
	protected function assertLength( $value, $length = self::LENGTH ) {
		if( $value!==NULL && strlen( $value ) <= intval( $length ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_LENGTH)
			    ->setValue($value));
		}
	}
	
	protected function assertMinLength( $value, $minLength = self::MINLENGTH ) {
		if( $value!==NULL && strlen( $value ) < intval( $minLength ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MIN_LENGTH)
			    ->setValue($value));
		}
	}
	
	protected function assertMaxLength( $value, $maxLength = self::MAXLENGTH ) {
		if( $value!==NULL && strlen( $value ) > intval( $maxLength ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MAX_LENGTH)
			    ->setValue($value));
		}
	}
	
	protected function assertEnumeration( $value, $enum = array() ) {
		if( !in_array( $value, $enum ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_ENUMERATION)
			    ->setValue($value));
		}
	}
	
	protected function assertWhiteSpace( $value, $whiteSpace = self::WHITESPACE ) {
		
	}
	
	protected function assertFractionDigits( $value, $fractionDigits = self::FRACTIONDIGITS ) {
		
	}
	
}