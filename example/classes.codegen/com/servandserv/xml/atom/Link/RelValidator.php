<?php

	namespace com\servandserv\xml\atom\Link;
	
	/**
	 *
	 * Валидатор класса com\servandserv\xml\atom\Link\Rel
	 *
	 */
	class RelValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Rel";
			$this->nodeName = "rel";
			$this->targetNS = "urn:com:servandserv:xml:atom";
			$this->classNS = "com:servandserv:xml:atom:Link";
		}
		public function validate() {
			parent::validate();
		}
	}
	

