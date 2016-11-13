<?php

namespace com\servandserv\happymeal\XML\Schema;

use \com\servandserv\happymeal\Bindings;

class AnySimpleTypeValidator extends AnyTypeValidator 
{

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
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\AnySimpleType $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		$this->assertSimple( $this->tdo->__text() );
	}

	protected function assertSimple( $value ) 
	{
	    if( $value === '' || ( $value !== '' && !is_object( $value ) && !is_array( $value ) ) ) return;
		$this->handleError(
			Bindings::create(self::ERROR_CLASS)
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_SIMPLE)
			    ->setAssertion(NULL)
			    ->setValue($value));
	}
	
	protected function assertPattern( $value, $regexp = self::PATTERN ) 
	{
	    $normalized = $this->whitespace($value);
		if ( $normalized===NULL || preg_match( $regexp, $normalized ) ) return;
		$this->handleError(
			Bindings::create(self::ERROR_CLASS)
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_PATTERN)
			    ->setAssertion($regexp)
			    ->setValue($value));
	}
	
	protected function assertMinInclusive( $value, $minInclusive = self::MININCLUSIVE ) 
	{
	    $normalized = $this->whitespace($value);
	    if( $normalized===NULL || doubleval($normalized) >= doubleval($minInclusive) ) return;
		$this->handleError(
			Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_MIN_INCLUSIVE)
		        ->setAssertion($minInclusive)
		        ->setValue($value));
	}
	
	protected function assertMinExclusive( $value, $minExclusive = self::MINEXCLUSIVE ) 
	{
	    $normalized = $this->whitespace($value);
	    if( $normalized===NULL || doubleval($normalized) > doubleval($minExclusive) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_MIN_EXCLUSIVE)
		        ->setAssertion($minExclusive)
		        ->setValue($value));
	}
	
	protected function assertMaxInclusive( $value, $maxInclusive = self::MAXINCLUSIVE ) 
	{
	    $normalized = $this->whitespace($value);
	    if( $normalized===NULL || doubleval($normalized) <= doubleval($maxInclusive) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_MAX_INCLUSIVE)
		        ->setAssertion($maxInclusive)
		        ->setValue($value));
	}
	
	protected function assertMaxExclusive( $value, $maxExclusive = self::MAXEXCLUSIVE ) 
	{
	    $normalized = $this->whitespace($value);
	    if( $normalized===NULL || doubleval($normalized) < doubleval($maxExclusive) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_MAX_EXCLUSIVE)
		        ->setAssertion($maxExclusive)
		        ->setValue($value));
	}
	
	protected function assertLength( $value, $length = self::LENGTH ) 
	{
	    $normalized = $this->whitespace($value);
		if( $normalized===NULL || strlen( $normalized ) === intval( $length ) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_LENGTH)
		        ->setAssertion($length)
		        ->setValue($value));
	}
	
	protected function assertMinLength( $value, $minLength = self::MINLENGTH ) 
	{
	    $normalized = $this->whitespace($value);
		if( $normalized===NULL || strlen( $normalized ) >= intval( $minLength ) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_MIN_LENGTH)
		        ->setAssertion($minLength)
		        ->setValue($value));
	}
	
	protected function assertMaxLength( $value, $maxLength = self::MAXLENGTH ) 
	{
	    $normalized = $this->whitespace($value);
		if( $normalized===NULL || strlen( $normalized ) <= intval( $maxLength ) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_MAX_LENGTH)
		        ->setAssertion($maxLength)
		        ->setValue($value));
	}
	
	protected function assertEnumeration( $value, $enum = array() ) 
	{
		if( in_array( $this->whitespace($value), $enum ) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_ENUMERATION)
		        ->setAssertion(implode(",",$enum))
		        ->setValue($value));
	}
	
	protected function assertFractionDigits( $value, $fractionDigits = self::FRACTIONDIGITS ) 
	{
		$normalized = $this->whitespace($value);
		if($normalized===NULL || strlen( substr( strrchr( $normalized, "." ), 1) ) === intval($fractionDigits) ) return;
		$this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_FRACTION_DIGITS)
		        ->setAssertion($fractionDigits)
		        ->setValue($value));
	}
	
	protected function assertTotalDigits( $value, $totalDigits = self::TOTALDIGITS )
	{
	    $normalized = $this->whitespace($value);
	    if($normalized===NULL || strlen( str_replace( array(".","-","+"), "", $normalized ) ) === intval($totalDigits) ) return;
	    $this->handleError(
		    Bindings::create(self::ERROR_CLASS)
		        ->setTargetNS($this->targetNS)
		        ->setName($this->className)
		        ->setRule(self::ASSERT_TOTAL_DIGITS)
		        ->setAssertion($totalDigits)
		        ->setValue($value));
	}
	
	/**
     * http://www.xmlplease.com/normalized
     *
     *
     * @param string $val
     * @return string
     */
    protected function whitespace( $val )
    {
        if( $val === NULL ) return NULL;
        switch ( $this::WHITESPACE ) {
            case "replace":
                $val = preg_replace( '/\s+/', ' ', $val );
                break;
            case "collapse":
                $val = trim( preg_replace( '/\s+/', ' ', $val ) );
                break;
        }
        return $val;
    }
	
}