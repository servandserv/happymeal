<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\AnyURI
	 *
	 */
	class AnyURIValidator extends \com\servandserv\happymeal\XML\Schema\AnyURIValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\AnyURI $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "AnyURI";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

