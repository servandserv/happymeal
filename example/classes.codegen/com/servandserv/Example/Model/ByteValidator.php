<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Byte
	 *
	 */
	class ByteValidator extends \com\servandserv\happymeal\XML\Schema\ByteValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Byte $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Byte";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

