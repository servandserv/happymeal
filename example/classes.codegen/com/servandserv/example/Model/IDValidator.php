<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\ID
	 *
	 */
	class IDValidator extends \com\servandserv\happymeal\XML\Schema\IDTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\IDType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "ID";
			$this->nodeName = "ID";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

