<?php

	namespace com\servandserv\example\PriceType;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\PriceType\Value
	 *
	 */
	class ValueValidator extends \com\servandserv\happymeal\XML\Schema\DecimalTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\DecimalType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Value";
			$this->nodeName = "value";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:PriceType";
		}
		public function validate() {
			parent::validate();
		}
	}
	

