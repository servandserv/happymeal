<?php

	namespace com\servandserv\happymeal\views\Request;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\Request\Method
	 *
	 */
	class MethodValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Method";
			$this->nodeName = "method";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:Request";
		}
		public function validate() {
			parent::validate();
		}
	}
	

