<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Lang
	 *
	 */
	class LangValidator extends \com\servandserv\happymeal\XML\Schema\LanguageTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\LanguageType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Lang";
			$this->nodeName = "lang";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

