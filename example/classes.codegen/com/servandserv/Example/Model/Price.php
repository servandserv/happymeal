<?php
	namespace com\servandserv\Example\Model;
		
	class Price extends \com\servandserv\Example\Model\PriceType {
			
		const NS = "urn:com:servandserv:Example:Model";
		const ROOT = "Price";
		const PREF = NULL;
		public function __construct() {
			parent::__construct();
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\Example\Model\PriceValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

