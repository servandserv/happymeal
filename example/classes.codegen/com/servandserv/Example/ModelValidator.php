<?php

	namespace com\servandserv\Example;
	
	/**
	 *
	 * Валидатор класса com\servandserv\Example\Model
	 *
	 */
	class ModelValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\Example\Model $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["c51ce410c124a10e0db5e4b97fc2af39"] = array(
			    "attribute"=>false,
			    "nodeName"=>"product",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\Example\Model\ProductValidator",
				"prop"=>"Product",
				"getter"=>"getProduct",
				"setter"=>"setProduct",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["aab3238922bcc25a6f606eb525ffdc56"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Price",
			    "class"=>"com\servandserv\Example\Model\Price",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"com\servandserv\Example\Model\PriceValidator",
				"prop"=>"Price",
				"getter"=>"getPrice",
				"setter"=>"setPrice",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["9bf31c7ff062936a96d3c8bd1f8f2ff3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"str",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\Example\Model\StrValidator",
				"prop"=>"Str",
				"getter"=>"getStr",
				"setter"=>"setStr",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["c74d97b01eae257e44aa9d5bade97baf"] = array(
			    "attribute"=>false,
			    "nodeName"=>"byte",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Byte",
			    "validator"=>"com\servandserv\Example\Model\ByteValidator",
				"prop"=>"Byte",
				"getter"=>"getByte",
				"setter"=>"setByte",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["70efdf2ec9b086079795c442636b55fb"] = array(
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
			    
			$this->__props["6f4922f45568161a8cdf4ad2299f6d23"] = array(
			    "attribute"=>true,
			    "nodeName"=>"ID",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\Example\Model\IDValidator",
				"prop"=>"ID",
				"getter"=>"getID",
				"setter"=>"setID",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "Model";
			$this->targetNS = "urn:com:servandserv:Example:Model";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Product','1' );
			$this->assertMaxOccurs( 'Product','1' );
			$this->assertMinOccurs( 'Price','1' );
			$this->assertMaxOccurs( 'Price','1' );
			$this->assertMinOccurs( 'Str','1' );
			$this->assertMaxOccurs( 'Str','1' );
			$this->assertMinOccurs( 'Byte','1' );
			$this->assertMaxOccurs( 'Byte','1' );
			$this->assertMinOccurs( 'Link','0' );
			$this->assertMaxOccurs( 'Link','unbounded' );
			$this->assertMinOccurs( 'ID','1' );
			$this->assertMaxOccurs( 'ID','1' );
		}
	}
	

