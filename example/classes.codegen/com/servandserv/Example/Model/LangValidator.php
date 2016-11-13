<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\Lang
	 *
	 */
	class LangValidator extends \com\servandserv\happymeal\XML\Schema\LanguageValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Language $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Lang";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

