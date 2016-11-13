<?php

	namespace ru\bystrobank\data\currency_bankiru\Office;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Office\Code
	 *
	 */
	class CodeValidator extends \ru\bystrobank\data\currency_bankiru\CodeTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Int $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Code";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
		}
	}
	

