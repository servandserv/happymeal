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
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\Example\Model\ProductValidator",
				"prop"=>"_Product",
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
			    "class"=>'com\servandserv\Example\Model\Price',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"com\servandserv\Example\Model\PriceValidator",
				"prop"=>"_Price",
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
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\Example\Model\StrValidator",
				"prop"=>"_Str",
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
			    "nodeName"=>"anyURI",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyURI",
			    "validator"=>"com\servandserv\Example\Model\AnyURIValidator",
				"prop"=>"_AnyURI",
				"getter"=>"getAnyURI",
				"setter"=>"setAnyURI",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["70efdf2ec9b086079795c442636b55fb"] = array(
			    "attribute"=>false,
			    "nodeName"=>"lang",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Language",
			    "validator"=>"com\servandserv\Example\Model\LangValidator",
				"prop"=>"_Lang",
				"getter"=>"getLang",
				"setter"=>"setLang",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["6f4922f45568161a8cdf4ad2299f6d23"] = array(
			    "attribute"=>false,
			    "nodeName"=>"boolval",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Boolean",
			    "validator"=>"com\servandserv\Example\Model\BoolvalValidator",
				"prop"=>"_Boolval",
				"getter"=>"getBoolval",
				"setter"=>"setBoolval",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1f0e3dad99908345f7439f8ffabdffc4"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Date",
			    "validator"=>"com\servandserv\Example\Model\DtValidator",
				"prop"=>"_Dt",
				"getter"=>"getDt",
				"setter"=>"setDt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["98f13708210194c475687be6106a3b84"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dtt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\DateTime",
			    "validator"=>"com\servandserv\Example\Model\DttValidator",
				"prop"=>"_Dtt",
				"getter"=>"getDtt",
				"setter"=>"setDtt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["3c59dc048e8850243be8079a5c74d079"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dur",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Duration",
			    "validator"=>"com\servandserv\Example\Model\DurValidator",
				"prop"=>"_Dur",
				"getter"=>"getDur",
				"setter"=>"setDur",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["b6d767d2f8ed5d21a44b0e5886680cb9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"byte",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Byte",
			    "validator"=>"com\servandserv\Example\Model\ByteValidator",
				"prop"=>"_Byte",
				"getter"=>"getByte",
				"setter"=>"setByte",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["37693cfc748049e45d87b8c7d8b9aacd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"short",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Short",
			    "validator"=>"com\servandserv\Example\Model\ShortValidator",
				"prop"=>"_Short",
				"getter"=>"getShort",
				"setter"=>"setShort",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1ff1de774005f8da13f42943881c655f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"int",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Int",
			    "validator"=>"com\servandserv\Example\Model\IntValidator",
				"prop"=>"_Int",
				"getter"=>"getInt",
				"setter"=>"setInt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["8e296a067a37563370ded05f5a3bf3ec"] = array(
			    "attribute"=>false,
			    "nodeName"=>"long",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Long",
			    "validator"=>"com\servandserv\Example\Model\LongValidator",
				"prop"=>"_Long",
				"getter"=>"getLong",
				"setter"=>"setLong",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["4e732ced3463d06de0ca9a15b6153677"] = array(
			    "attribute"=>false,
			    "nodeName"=>"integer",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Integer",
			    "validator"=>"com\servandserv\Example\Model\IntegerValidator",
				"prop"=>"_Integer",
				"getter"=>"getInteger",
				"setter"=>"setInteger",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["02e74f10e0327ad868d138f2b4fdd6f0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"decimal",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Decimal",
			    "validator"=>"com\servandserv\Example\Model\DecimalValidator",
				"prop"=>"_Decimal",
				"getter"=>"getDecimal",
				"setter"=>"setDecimal",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["33e75ff09dd601bbe69f351039152189"] = array(
			    "attribute"=>false,
			    "nodeName"=>"double",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Double",
			    "validator"=>"com\servandserv\Example\Model\DoubleValidator",
				"prop"=>"_Double",
				"getter"=>"getDouble",
				"setter"=>"setDouble",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["6ea9ab1baa0efb9e19094440c317e21b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"float",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Float",
			    "validator"=>"com\servandserv\Example\Model\FloatValidator",
				"prop"=>"_Float",
				"getter"=>"getFloat",
				"setter"=>"setFloat",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["34173cb38f07f89ddbebc2ac9128303f"] = array(
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
			    
			$this->__props["c16a5320fa475530d9583c34fd356ef5"] = array(
			    "attribute"=>true,
			    "nodeName"=>"ID",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\ID",
			    "validator"=>"com\servandserv\Example\Model\IDValidator",
				"prop"=>"_ID",
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
			$this->assertMinOccurs( '_Product','1' );
			$this->assertMaxOccurs( '_Product','1' );
			$this->assertMinOccurs( '_Price','1' );
			$this->assertMaxOccurs( '_Price','1' );
			$this->assertMinOccurs( '_Str','1' );
			$this->assertMaxOccurs( '_Str','1' );
			$this->assertMinOccurs( '_AnyURI','1' );
			$this->assertMaxOccurs( '_AnyURI','1' );
			$this->assertMinOccurs( '_Lang','1' );
			$this->assertMaxOccurs( '_Lang','1' );
			$this->assertMinOccurs( '_Boolval','1' );
			$this->assertMaxOccurs( '_Boolval','1' );
			$this->assertMinOccurs( '_Dt','1' );
			$this->assertMaxOccurs( '_Dt','1' );
			$this->assertMinOccurs( '_Dtt','1' );
			$this->assertMaxOccurs( '_Dtt','1' );
			$this->assertMinOccurs( '_Dur','1' );
			$this->assertMaxOccurs( '_Dur','1' );
			$this->assertMinOccurs( '_Byte','1' );
			$this->assertMaxOccurs( '_Byte','1' );
			$this->assertMinOccurs( '_Short','1' );
			$this->assertMaxOccurs( '_Short','1' );
			$this->assertMinOccurs( '_Int','1' );
			$this->assertMaxOccurs( '_Int','1' );
			$this->assertMinOccurs( '_Long','1' );
			$this->assertMaxOccurs( '_Long','1' );
			$this->assertMinOccurs( '_Integer','1' );
			$this->assertMaxOccurs( '_Integer','1' );
			$this->assertMinOccurs( '_Decimal','1' );
			$this->assertMaxOccurs( '_Decimal','1' );
			$this->assertMinOccurs( '_Double','1' );
			$this->assertMaxOccurs( '_Double','1' );
			$this->assertMinOccurs( '_Float','1' );
			$this->assertMaxOccurs( '_Float','1' );
			$this->assertMinOccurs( '_Link','0' );
			$this->assertMaxOccurs( '_Link','unbounded' );
			$this->assertMinOccurs( '_ID','1' );
			$this->assertMaxOccurs( '_ID','1' );
		}
	}
	

