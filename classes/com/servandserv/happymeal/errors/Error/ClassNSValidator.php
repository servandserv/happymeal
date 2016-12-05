<?php

	namespace com\servandserv\happymeal\errors\Error;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\errors\Error\ClassNS
	 *
	 */
	class ClassNSValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "ClassNS";
			$this->nodeName = "classNS";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
			$this->classNS = "com:servandserv:happymeal:errors:Error";
		}
		public function validate() {
			parent::validate();
		}
	}
	

