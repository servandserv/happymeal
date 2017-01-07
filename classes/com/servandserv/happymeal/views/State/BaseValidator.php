<?php

	namespace com\servandserv\happymeal\views\State;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\State\Base
	 *
	 */
	class BaseValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Base";
			$this->nodeName = "base";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:State";
		}
		public function validate() {
			parent::validate();
		}
	}
	

