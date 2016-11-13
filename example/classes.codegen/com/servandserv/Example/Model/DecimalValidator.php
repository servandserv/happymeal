<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Decimal
	 *
	 */
	class DecimalValidator extends \com\servandserv\happymeal\XML\Schema\DecimalValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Decimal $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Decimal";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

