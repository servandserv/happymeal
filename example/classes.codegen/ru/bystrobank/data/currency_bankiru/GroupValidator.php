<?php

	namespace ru\bystrobank\data\currency_bankiru;
	
	/**
	 *
	 * Валидатор класса ru\bystrobank\data\currency_bankiru\Group
	 *
	 */
	class GroupValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \ru\bystrobank\data\currency_bankiru\Group $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["6c8349cc7260ae62e3b1396831a8398f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"office",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Office',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\OfficeValidator",
				"prop"=>"_Office",
				"getter"=>"getOffice",
				"setter"=>"setOffice",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			    
			$this->__props["d9d4f495e875a2e075a1a4a6e1b9770f"] = array(
			    "attribute"=>true,
			    "nodeName"=>"version",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Group',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"ru\bystrobank\data\currency_bankiru\Group\VersionValidator",
				"prop"=>"_Version",
				"getter"=>"getVersion",
				"setter"=>"setVersion",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "Group";
			$this->targetNS = "urn:ru:bystrobank:data:currency_bankiru";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( '_Office','0' );
			$this->assertMaxOccurs( '_Office','unbounded' );
			$this->assertMinOccurs( '_Version','1' );
			$this->assertMaxOccurs( '_Version','1' );
		}
	}
	

