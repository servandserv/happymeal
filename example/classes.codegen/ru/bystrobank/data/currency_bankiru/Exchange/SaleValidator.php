<?php

	namespace ru\bystrobank\data\currency_bankiru\Exchange;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Exchange\Sale
	 *
	 */
	class SaleValidator extends \com\servandserv\happymeal\XML\Schema\DoubleValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Double $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Sale";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
		}
	}
