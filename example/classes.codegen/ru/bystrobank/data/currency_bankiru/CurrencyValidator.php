<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Currency
	 *
	 */
	class CurrencyValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \ru\bystrobank\data\currency_bankiru\Currency $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["2a38a4a9316c49e5a833517c45d31070"] = array(
			    "attribute"=>false,
			    "nodeName"=>"exchanges",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Exchanges',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\ExchangesValidator",
				"prop"=>"_Exchanges",
				"getter"=>"getExchanges",
				"setter"=>"setExchanges",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["7647966b7343c29048673252e490f736"] = array(
			    "attribute"=>true,
			    "nodeName"=>"id",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Currency',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Int",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\Currency\IdValidator",
				"prop"=>"_Id",
				"getter"=>"getId",
				"setter"=>"setId",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "Currency";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( '_Exchanges','1' );
			$this->assertMaxOccurs( '_Exchanges','1' );
			$this->assertMinOccurs( '_Id','1' );
			$this->assertMaxOccurs( '_Id','1' );
		}
	}
	

