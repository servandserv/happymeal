<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Integer
	 *
	 */
	class IntegerValidator extends \com\servandserv\happymeal\XML\Schema\IntegerTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\IntegerType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Integer";
			$this->nodeName = "integer";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

