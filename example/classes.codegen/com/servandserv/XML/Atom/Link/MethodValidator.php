<?php

	namespace com\servandserv\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса com\servandserv\XML\Atom\Link\Method
	 *
	 */
	class MethodValidator extends \com\servandserv\XML\Atom\Link\MethodTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Method";
			$this->targetNS = "urn:com:servandserv:XML:Atom:Link";
		}
		public function validate() {
			parent::validate();
		}
	}
	

