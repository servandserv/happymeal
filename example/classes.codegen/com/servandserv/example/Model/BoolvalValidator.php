<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Boolval
	 *
	 */
	class BoolvalValidator extends \com\servandserv\happymeal\XML\Schema\BooleanTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\BooleanType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Boolval";
			$this->nodeName = "boolval";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

