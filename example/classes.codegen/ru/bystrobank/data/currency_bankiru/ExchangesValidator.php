<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Exchanges
	 *
	 */
	class ExchangesValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \ru\bystrobank\data\currency_bankiru\Exchanges $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["812b4ba287f5ee0bc9d43bbf5bbe87fb"] = array(
			    "attribute"=>false,
			    "nodeName"=>"exchange",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\ExchangeValidator",
				"prop"=>"_Exchange",
				"getter"=>"getExchange",
				"setter"=>"setExchange",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "Exchanges";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( '_Exchange','0' );
			$this->assertMaxOccurs( '_Exchange','unbounded' );
		}
	}
	

