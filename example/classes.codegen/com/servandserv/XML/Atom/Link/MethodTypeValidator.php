<?php

	namespace com\servandserv\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса com\servandserv\XML\Atom\Link\MethodType
	 *
	 */
	class MethodTypeValidator extends \com\servandserv\happymeal\XML\Schema\StringValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "MethodType";
			$this->targetNS = "urn:com:servandserv:XML:Atom:Link";
		}
		public function validate() {
			parent::validate();
			$enum = array( 'GET', 'POST' );
			$this->assertEnumeration( $this->tdo->_text() , $enum );
		}
	}
	

