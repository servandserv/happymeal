<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\AnyURI
	 *
	 */
	class AnyURIValidator extends \com\servandserv\happymeal\XML\Schema\AnyURITypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\AnyURIType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "AnyURI";
			$this->nodeName = "anyURI";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

