<?php

	namespace com\servandserv\happymeal\views\TokenType;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\TokenType\Id
	 *
	 */
	class IdValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Id";
			$this->nodeName = "id";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:TokenType";
		}
		public function validate() {
			parent::validate();
		}
	}
	
