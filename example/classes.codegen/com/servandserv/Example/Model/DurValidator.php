<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Dur
	 *
	 */
	class DurValidator extends \com\servandserv\happymeal\XML\Schema\DurationValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Duration $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Dur";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

