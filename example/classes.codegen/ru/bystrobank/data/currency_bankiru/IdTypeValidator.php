<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\IdType
	 *
	 */
	class IdTypeValidator extends \com\servandserv\happymeal\XML\Schema\IntValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Int $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "IdType";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$enum = array( '840', '978' );
			$this->assertEnumeration( $this->tdo->__text() , $enum );
		}
	}
	

