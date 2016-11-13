<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\CodeType
	 *
	 */
	class CodeTypeValidator extends \com\servandserv\happymeal\XML\Schema\IntValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\Int $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "CodeType";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$enum = array( '186', '273', '286', '351', '461', '1028', '1386', '1514', '1560', '1561', '1569', '1574', '1830', '1851', '1852', '2141', '2173', '2296', '2301', '2302', '2305', '3098', '3253', '3273', '3336', '3580', '3623', '3662', '3692', '3784', '3808', '3829', '3867' );
			$this->assertEnumeration( $this->tdo->__text() , $enum );
		}
	}
	

