<?php

	namespace com\servandserv\happymeal\views\TokenType;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\TokenType\Created
	 *
	 */
	class CreatedValidator extends \com\servandserv\happymeal\XML\Schema\IntegerTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\IntegerType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Created";
			$this->nodeName = "created";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:TokenType";
		}
		public function validate() {
			parent::validate();
		}
	}
	

