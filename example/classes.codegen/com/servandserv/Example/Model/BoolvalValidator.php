<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Boolval
	 *
	 */
	class BoolvalValidator extends \com\servandserv\happymeal\XML\Schema\BooleanValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Boolean $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Boolval";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

