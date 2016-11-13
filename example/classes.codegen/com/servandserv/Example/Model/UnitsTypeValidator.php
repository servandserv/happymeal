<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\UnitsType
	 *
	 */
	class UnitsTypeValidator extends \com\servandserv\happymeal\XML\Schema\StringValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "UnitsType";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
			$enum = array( 'USD', 'EUR', 'GBP' );
			$this->assertEnumeration( $this->tdo->__text() , $enum );
		}
	}
	

