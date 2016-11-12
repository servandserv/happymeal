<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\ID
	 *
	 */
	class IDValidator extends \com\servandserv\happymeal\XML\Schema\StringValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "ID";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

