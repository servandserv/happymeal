<?php

	namespace com\servandserv\happymeal\errors\Error;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\errors\Error\Rule
	 *
	 */
	class RuleValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Rule";
			$this->nodeName = "rule";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
			$this->classNS = "com:servandserv:happymeal:errors:Error";
		}
		public function validate() {
			parent::validate();
		}
	}
	

