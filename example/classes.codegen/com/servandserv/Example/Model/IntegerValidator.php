<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Integer
	 *
	 */
	class IntegerValidator extends \com\servandserv\happymeal\XML\Schema\IntegerValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Integer $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Integer";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

