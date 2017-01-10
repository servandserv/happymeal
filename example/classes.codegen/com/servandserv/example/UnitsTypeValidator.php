<?php

	namespace com\servandserv\example;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\UnitsType
	 *
	 */
	class UnitsTypeValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "UnitsType";
			$this->nodeName = "unitsType";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example";
		}
		public function validate() {
			parent::validate();
			$enum = array( 'USD', 'EUR', 'GBP' );
			$this->assertEnumeration( $this->tdo->__text() , $enum );
		}
	}
	

