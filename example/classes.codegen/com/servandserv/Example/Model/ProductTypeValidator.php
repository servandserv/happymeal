<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\ProductType
	 *
	 */
	class ProductTypeValidator extends \com\servandserv\happymeal\XML\Schema\StringValidator {
		const PATTERN1 = "/^[a-zA-Z]{1,5}$/u";
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "ProductType";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
			$this->assertPattern( $this->tdo->_text(), $this::PATTERN1 );
		}
	}
