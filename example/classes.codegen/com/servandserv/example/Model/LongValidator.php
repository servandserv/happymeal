<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Long
	 *
	 */
	class LongValidator extends \com\servandserv\happymeal\XML\Schema\LongTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\LongType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Long";
			$this->nodeName = "long";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

