<?php

	namespace ru\bystrobank\data\currency_bankiru\Exchange;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Exchange\Amount
	 *
	 */
	class AmountValidator extends \com\servandserv\happymeal\XML\Schema\IntValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Int $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Amount";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
		}
	}
	

