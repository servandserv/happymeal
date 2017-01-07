<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Dur
	 *
	 */
	class DurValidator extends \com\servandserv\happymeal\XML\Schema\DurationTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\DurationType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Dur";
			$this->nodeName = "dur";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

