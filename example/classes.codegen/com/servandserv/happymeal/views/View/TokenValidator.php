<?php

	namespace com\servandserv\happymeal\views\View;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\View\Token
	 *
	 */
	class TokenValidator extends \com\servandserv\happymeal\views\TokenTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\View\Token $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Token";
			$this->nodeName = "Token";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:View";
		}
		public function validate() {
			parent::validate();
		}
	}
	

