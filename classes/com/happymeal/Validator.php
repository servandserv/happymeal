<?php

namespace com\happymeal;

abstract class Validator 
{

    const ASSERT_MIN_OCCURS = 1000;
    const ASSERT_MAX_OCCURS = 1001;
    const ASSERT_CHOICE = 1002;
    const ASSERT_FIXED = 1003;
    
    const ASSERT_SIMPLE = 2000;
    const ASSERT_PATTERN = 2001;
    const ASSERT_MIN_INCLUSIVE = 2002;
    const ASSERT_MIN_EXCLUSIVE = 2003;
    const ASSERT_MAX_INCLUSIVE = 2004;
    const ASSERT_MAX_EXCLUSIVE = 2005;
    const ASSERT_LENGTH = 2006;
    const ASSERT_MIN_LENGTH = 2007;
    const ASSERT_MAX_LENGTH = 2008;
    const ASSERT_ENUMERATION = 2009;
    const ASSERT_FRACTION_DIGITS = 2010;
    const ASSERT_BOOLEAN = 2011;
    
    const VALIDATION_ERROR = 450;
    
	protected $validationHandler;

	public function __construct ( com\happymeal\ValidationHandler $handler = NULL ) 
	{
		$this->validationHandler = $handler;
	}

	protected function handleError ( \com\happymeal\errors\Error $error ) 
	{
		if( is_object( $this->validationHandler ) ) {
			$this->validationHandler->handleError( $error->setCode(self::VALIDATION_ERROR) );
		} else {
			throw new \Exception( $error->getRule(), $error->getCode() );
		}
	}

	abstract public function validate ();
}
