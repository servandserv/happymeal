<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Int
	 *
	 */
	class IntValidator extends \com\servandserv\happymeal\XML\Schema\IntTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\IntType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Int";
			$this->nodeName = "int";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

