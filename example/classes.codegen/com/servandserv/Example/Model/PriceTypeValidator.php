<?php

	namespace com\servandserv\Example\Model;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model\PriceType
	 *
	 */
	class PriceTypeValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\Example\Model\PriceType $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["182be0c5cdcd5072bb1864cdee4d3d6e"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model\PriceType',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Decimal",
			    "validator"=>"com\servandserv\Example\Model\PriceType\ValueValidator",
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["e369853df766fa44e1ed0ff613f563bd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"units",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model\PriceType',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\Example\Model\PriceType\UnitsValidator",
				"prop"=>"_Units",
				"getter"=>"getUnits",
				"setter"=>"setUnits",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1c383cd30b7c298ab50293adfecb7b18"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Link",
			    "class"=>'com\servandserv\XML\Atom\Link',
			    "classNS"=>'com\servandserv\XML\Atom',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"com\servandserv\XML\Atom\LinkValidator",
				"prop"=>"_Link",
				"getter"=>"getLink",
				"setter"=>"setLink",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "PriceType";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( '_Value','1' );
			$this->assertMaxOccurs( '_Value','1' );
			$this->assertMinOccurs( '_Units','1' );
			$this->assertMaxOccurs( '_Units','1' );
			$this->assertMinOccurs( '_Link','0' );
			$this->assertMaxOccurs( '_Link','unbounded' );
		}
	}
	

