<?php

	namespace com\servandserv\Example\Model\PriceType;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\PriceType\Value
	 *
	 */
	class ValueValidator extends \com\servandserv\happymeal\XML\Schema\DecimalValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Decimal $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Value";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

