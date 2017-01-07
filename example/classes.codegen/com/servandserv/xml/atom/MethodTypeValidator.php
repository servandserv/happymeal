<?php

	namespace com\servandserv\xml\atom;
	
	/**
	 *
	 * Валидатор класса com\servandserv\xml\atom\MethodType
	 *
	 */
	class MethodTypeValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "MethodType";
			$this->nodeName = "methodType";
			$this->targetNS = "urn:com:servandserv:xml:atom";
			$this->classNS = "com:servandserv:xml:atom";
		}
		public function validate() {
			parent::validate();
			$enum = array( 'GET', 'POST' );
			$this->assertEnumeration( $this->tdo->__text() , $enum );
		}
	}
	

