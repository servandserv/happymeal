<?php

	namespace com\servandserv\example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model\Byte
	 *
	 */
	class ByteValidator extends \com\servandserv\happymeal\XML\Schema\ByteTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\ByteType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Byte";
			$this->nodeName = "byte";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example:Model";
		}
		public function validate() {
			parent::validate();
		}
	}
	

