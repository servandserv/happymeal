<?php

	namespace com\servandserv\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса com\servandserv\XML\Atom\Link\Type
	 *
	 */
	class TypeValidator extends \com\servandserv\XML\Atom\Link\TypeTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Type";
			$this->targetNS = "urn:com:servandserv:XML:Atom:Link";
		}
		public function validate() {
			parent::validate();
		}
	}
	

