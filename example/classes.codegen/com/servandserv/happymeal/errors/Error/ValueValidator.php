<?php

	namespace com\servandserv\happymeal\errors\Error;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\errors\Error\Value
	 *
	 */
	class ValueValidator extends \com\servandserv\happymeal\XML\Schema\StringValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Value";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
		}
		public function validate() {
			parent::validate();
		}
	}
	

