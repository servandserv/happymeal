<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Exchange
	 *
	 */
	class ExchangeValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \ru\bystrobank\data\currency_bankiru\Exchange $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["e2ef524fbf3d9fe611d5a8e90fefdc9c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"amount",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Int",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\Exchange\AmountValidator",
				"prop"=>"_Amount",
				"getter"=>"getAmount",
				"setter"=>"setAmount",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["ed3d2c21991e3bef5e069713af9fa6ca"] = array(
			    "attribute"=>false,
			    "nodeName"=>"buy",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Double",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\Exchange\BuyValidator",
				"prop"=>"_Buy",
				"getter"=>"getBuy",
				"setter"=>"setBuy",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["ac627ab1ccbdb62ec96e702f07f6425b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"sale",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Double",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\Exchange\SaleValidator",
				"prop"=>"_Sale",
				"getter"=>"getSale",
				"setter"=>"setSale",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "Exchange";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( '_Amount','1' );
			$this->assertMaxOccurs( '_Amount','1' );
			$this->assertMinOccurs( '_Buy','1' );
			$this->assertMaxOccurs( '_Buy','1' );
			$this->assertMinOccurs( '_Sale','1' );
			$this->assertMaxOccurs( '_Sale','1' );
		}
	}
	

