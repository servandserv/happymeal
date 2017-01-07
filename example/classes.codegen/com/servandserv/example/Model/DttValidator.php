<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Dtt
	 *
	 */
	class DttValidator extends \com\servandserv\happymeal\XML\Schema\DateTimeTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\DateTimeType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Dtt";
			$this->nodeName = "dtt";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

