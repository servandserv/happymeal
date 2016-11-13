<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Long
	 *
	 */
	class LongValidator extends \com\servandserv\happymeal\XML\Schema\LongValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Long $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Long";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

