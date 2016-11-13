<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Float
	 *
	 */
	class FloatValidator extends \com\servandserv\happymeal\XML\Schema\FloatValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Float $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Float";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

