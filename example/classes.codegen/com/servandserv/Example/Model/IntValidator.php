<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Int
	 *
	 */
	class IntValidator extends \com\servandserv\happymeal\XML\Schema\IntValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Int $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Int";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

