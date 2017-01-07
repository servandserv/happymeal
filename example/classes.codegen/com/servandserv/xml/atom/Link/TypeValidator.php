<?php

	namespace com\servandserv\xml\atom\Link;
	
	/**
	 *
	 * Валидатор класса com\servandserv\xml\atom\Link\Type
	 *
	 */
	class TypeValidator extends \com\servandserv\xml\atom\TypeTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Type";
			$this->nodeName = "type";
			$this->targetNS = "urn:com:servandserv:xml:atom";
			$this->classNS = "com:servandserv:xml:atom:Link";
		}
		public function validate() {
			parent::validate();
		}
	}
	

