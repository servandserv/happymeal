<?php

	namespace com\servandserv\happymeal\errors\Error;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\errors\Error\Code
	 *
	 */
	class CodeValidator extends \com\servandserv\happymeal\XML\Schema\IntegerValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Integer $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Code";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
		}
		public function validate() {
			parent::validate();
		}
	}
	

