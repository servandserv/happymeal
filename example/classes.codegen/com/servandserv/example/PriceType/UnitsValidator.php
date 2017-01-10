<?php

	namespace com\servandserv\example\PriceType;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\PriceType\Units
	 *
	 */
	class UnitsValidator extends \com\servandserv\example\UnitsTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Units";
			$this->nodeName = "units";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:PriceType";
		}
		public function validate() {
			parent::validate();
		}
	}
	

