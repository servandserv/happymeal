<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Bite
	 *
	 */
	class BiteValidator extends \com\servandserv\happymeal\XML\Schema\BiteValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Bite $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Bite";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

