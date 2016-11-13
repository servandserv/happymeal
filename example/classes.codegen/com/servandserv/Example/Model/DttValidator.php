<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Dtt
	 *
	 */
	class DttValidator extends \com\servandserv\happymeal\XML\Schema\DateTimeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\DateTime $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Dtt";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

