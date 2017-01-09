<?php
	namespace com\servandserv\happymeal\views\View;
		
	class Referrer extends \com\servandserv\happymeal\views\TokenType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Referrer";
		const PREF = NULL;
		public function __construct() {
			parent::__construct();
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\views\TokenTypeValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

