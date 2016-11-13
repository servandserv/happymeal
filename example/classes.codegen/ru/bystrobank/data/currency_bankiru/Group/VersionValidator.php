<?php

	namespace ru\bystrobank\data\currency_bankiru\Group;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Group\Version
	 *
	 */
	class VersionValidator extends \com\servandserv\happymeal\XML\Schema\StringValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\String $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "Version";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
		}
	}
	

