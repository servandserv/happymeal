<?php

	namespace com\servandserv\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса com\servandserv\XML\Atom\Link\Rel
	 *
	 */
	class RelValidator extends \com\servandserv\happymeal\XML\Schema\StringValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Rel";
			$this->targetNS = "urn:com:servandserv:XML:Atom:Link";
		}
		public function validate() {
			parent::validate();
		}
	}
	

