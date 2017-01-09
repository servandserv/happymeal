<?php

	namespace com\servandserv\happymeal\views\View;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\View\Referrer
	 *
	 */
	class ReferrerValidator extends \com\servandserv\happymeal\views\TokenTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\View\Referrer $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Referrer";
			$this->nodeName = "Referrer";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:View";
		}
		public function validate() {
			parent::validate();
		}
	}
	

