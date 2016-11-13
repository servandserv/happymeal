<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Office
	 *
	 */
	class OfficeValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \ru\bystrobank\data\currency_bankiru\Office $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["642e92efb79421734881b53e1e1b18b6"] = array(
			    "attribute"=>false,
			    "nodeName"=>"currencies",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Currencies',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\CurrenciesValidator",
				"prop"=>"_Currencies",
				"getter"=>"getCurrencies",
				"setter"=>"setCurrencies",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["f457c545a9ded88f18ecee47145a72c0"] = array(
			    "attribute"=>true,
			    "nodeName"=>"code",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Office',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Int",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\Office\CodeValidator",
				"prop"=>"_Code",
				"getter"=>"getCode",
				"setter"=>"setCode",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "Office";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( '_Currencies','1' );
			$this->assertMaxOccurs( '_Currencies','1' );
			$this->assertMinOccurs( '_Code','1' );
			$this->assertMaxOccurs( '_Code','1' );
		}
	}
	

