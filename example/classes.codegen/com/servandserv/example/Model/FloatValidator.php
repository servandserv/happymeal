<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Float
	 *
	 */
	class FloatValidator extends \com\servandserv\happymeal\XML\Schema\FloatTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\FloatType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Float";
			$this->nodeName = "float";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	
