<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Currencies
	 *
	 */
	class CurrenciesValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \ru\bystrobank\data\currency_bankiru\Currencies $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["93db85ed909c13838ff95ccfa94cebd9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"currency",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Currency',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\CurrencyValidator",
				"prop"=>"_Currency",
				"getter"=>"getCurrency",
				"setter"=>"setCurrency",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"true",
				"minOccurs"=>"1",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "Currencies";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( '_Currency','1' );
			$this->assertMaxOccurs( '_Currency','unbounded' );
		}
	}
	

