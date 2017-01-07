<?php

	namespace com\servandserv\happymeal\views\Param;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\Param\Value
	 *
	 */
	class ValueValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Value";
			$this->nodeName = "value";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:Param";
		}
		public function validate() {
			parent::validate();
		}
	}
	

