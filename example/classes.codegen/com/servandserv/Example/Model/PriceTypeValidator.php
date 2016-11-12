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
			    
			$this->__props["98f13708210194c475687be6106a3b84"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model\PriceType",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Decimal",
			    "validator"=>"com\servandserv\Example\Model\PriceType\ValueValidator",
				"prop"=>"Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["3c59dc048e8850243be8079a5c74d079"] = array(
			    "attribute"=>false,
			    "nodeName"=>"units",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model\PriceType",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\Example\Model\PriceType\UnitsValidator",
				"prop"=>"Units",
				"getter"=>"getUnits",
				"setter"=>"setUnits",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["b6d767d2f8ed5d21a44b0e5886680cb9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Link",
			    "class"=>"com\servandserv\XML\Atom\Link",
			    "classNS"=>"com\servandserv\XML\Atom",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"com\servandserv\XML\Atom\LinkValidator",
				"prop"=>"Link",
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
			$this->assertMinOccurs( 'Value','1' );
			$this->assertMaxOccurs( 'Value','1' );
			$this->assertMinOccurs( 'Units','1' );
			$this->assertMaxOccurs( 'Units','1' );
			$this->assertMinOccurs( 'Link','0' );
			$this->assertMaxOccurs( 'Link','unbounded' );
		}
	}
	

