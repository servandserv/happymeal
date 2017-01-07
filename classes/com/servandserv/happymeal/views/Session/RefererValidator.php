<?php

	namespace com\servandserv\happymeal\views\Session;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\Session\Referer
	 *
	 */
	class RefererValidator extends \com\servandserv\happymeal\views\TokenTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\Session\Referer $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Referer";
			$this->nodeName = "Referer";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:Session";
		}
		public function validate() {
			parent::validate();
		}
	}
	

