<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Dt
	 *
	 */
	class DtValidator extends \com\servandserv\happymeal\XML\Schema\DateTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\DateType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Dt";
			$this->nodeName = "dt";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

