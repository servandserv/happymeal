<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Short
	 *
	 */
	class ShortValidator extends \com\servandserv\happymeal\XML\Schema\ShortValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Short $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Short";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

