<?php

	namespace com\servandserv\example;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\ProductType
	 *
	 */
	class ProductTypeValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		const PATTERN1 = "/^[a-zA-Z]{1,5}$/u";
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "ProductType";
			$this->nodeName = "productType";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example";
		}
		public function validate() {
			parent::validate();
			$this->assertPattern( $this->tdo->__text(), $this::PATTERN1 );
		}
	}
	

