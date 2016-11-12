<?php

	namespace com\servandserv\Example\Model\PriceType;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\PriceType\Units
	 *
	 */
	class UnitsValidator extends \com\servandserv\Example\Model\UnitsTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Units";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

