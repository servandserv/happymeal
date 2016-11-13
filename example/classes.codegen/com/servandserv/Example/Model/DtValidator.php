<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Dt
	 *
	 */
	class DtValidator extends \com\servandserv\happymeal\XML\Schema\DateValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Date $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Dt";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

