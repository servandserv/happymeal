<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Decimal
	 *
	 */
	class DecimalValidator extends \com\servandserv\happymeal\XML\Schema\DecimalTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\DecimalType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Decimal";
			$this->nodeName = "decimal";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

