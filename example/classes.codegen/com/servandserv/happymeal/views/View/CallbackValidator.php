<?php

	namespace com\servandserv\happymeal\views\View;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\View\Callback
	 *
	 */
	class CallbackValidator extends \com\servandserv\happymeal\views\TokenTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\View\Callback $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Callback";
			$this->nodeName = "Callback";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:View";
		}
		public function validate() {
			parent::validate();
		}
	}
	

