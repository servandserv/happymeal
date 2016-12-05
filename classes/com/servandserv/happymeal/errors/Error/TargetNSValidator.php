<?php

	namespace com\servandserv\happymeal\errors\Error;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\errors\Error\TargetNS
	 *
	 */
	class TargetNSValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "TargetNS";
			$this->nodeName = "targetNS";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
			$this->classNS = "com:servandserv:happymeal:errors:Error";
		}
		public function validate() {
			parent::validate();
		}
	}
	

