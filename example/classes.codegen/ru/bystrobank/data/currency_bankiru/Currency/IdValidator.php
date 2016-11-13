<?php

	namespace ru\bystrobank\data\currency_bankiru\Currency;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Currency\Id
	 *
	 */
	class IdValidator extends \ru\bystrobank\data\currency_bankiru\IdTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Int $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Id";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
		}
	}
	

