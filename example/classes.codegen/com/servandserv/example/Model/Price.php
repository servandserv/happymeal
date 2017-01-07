<?php
	namespace com\servandserv\example\Model;
		
	class Price extends \com\servandserv\example\PriceType {
			
		const NS = "urn:com:servandserv:example";
		const ROOT = "Price";
		const PREF = NULL;
		public function __construct() {
			parent::__construct();
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\example\Model\PriceValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

