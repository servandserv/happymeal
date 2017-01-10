<?php

	namespace com\servandserv\example;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\PriceType
	 *
	 */
	class PriceTypeValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\example\PriceType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["d645920e395fedad7bbbed0eca3fe2e0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\PriceType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DecimalType',
			    "validator"=>'com\servandserv\example\PriceType\ValueValidator',
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["3416a75f4cea9109507cacd8e2f2aefc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"units",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\PriceType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\example\PriceType\UnitsValidator',
				"prop"=>"_Units",
				"getter"=>"getUnits",
				"setter"=>"setUnits",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["a1d0c6e83f027327d8461063f4ac58a6"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Link",
			    "class"=>'com\servandserv\xml\atom\Link',
			    "classNS"=>'com\servandserv\xml\atom',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\xml\atom\LinkValidator',
				"prop"=>"_Link",
				"getter"=>"getLink",
				"setter"=>"setLink",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "PriceType";
			$this->nodeName = "priceType";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getValue','value','1' );
			$this->assertMaxOccurs( 'getValue','value','1' );
			$this->assertMinOccurs( 'getUnits','units','1' );
			$this->assertMaxOccurs( 'getUnits','units','1' );
			$this->assertMinOccurs( 'getLink','Link','0' );
			$this->assertMaxOccurs( 'getLink','Link','unbounded' );
		}
	}
	

