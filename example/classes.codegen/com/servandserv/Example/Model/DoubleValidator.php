<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Double
	 *
	 */
	class DoubleValidator extends \com\servandserv\happymeal\XML\Schema\DoubleValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Double $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Double";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

