<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Double
	 *
	 */
	class DoubleValidator extends \com\servandserv\happymeal\XML\Schema\DoubleTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\DoubleType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Double";
			$this->nodeName = "double";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

