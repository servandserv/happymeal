<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Short
	 *
	 */
	class ShortValidator extends \com\servandserv\happymeal\XML\Schema\ShortTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\ShortType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Short";
			$this->nodeName = "short";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

