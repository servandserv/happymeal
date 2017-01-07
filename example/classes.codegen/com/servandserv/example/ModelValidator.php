<?php

	namespace com\servandserv\example;
	
	/**
	 *
	 * Валидатор класса com\servandserv\example\Model
	 *
	 */
	class ModelValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\example\Model $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["1f0e3dad99908345f7439f8ffabdffc4"] = array(
			    "attribute"=>false,
			    "nodeName"=>"product",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\example\Model\ProductValidator',
				"prop"=>"_Product",
				"getter"=>"getProduct",
				"setter"=>"setProduct",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["98f13708210194c475687be6106a3b84"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Price",
			    "class"=>'com\servandserv\example\Model\Price',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\example\Model\PriceValidator',
				"prop"=>"_Price",
				"getter"=>"getPrice",
				"setter"=>"setPrice",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["3c59dc048e8850243be8079a5c74d079"] = array(
			    "attribute"=>false,
			    "nodeName"=>"str",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\example\Model\StrValidator',
				"prop"=>"_Str",
				"getter"=>"getStr",
				"setter"=>"setStr",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["b6d767d2f8ed5d21a44b0e5886680cb9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"anyURI",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyURIType',
			    "validator"=>'com\servandserv\example\Model\AnyURIValidator',
				"prop"=>"_AnyURI",
				"getter"=>"getAnyURI",
				"setter"=>"setAnyURI",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["37693cfc748049e45d87b8c7d8b9aacd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"lang",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\LanguageType',
			    "validator"=>'com\servandserv\example\Model\LangValidator',
				"prop"=>"_Lang",
				"getter"=>"getLang",
				"setter"=>"setLang",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1ff1de774005f8da13f42943881c655f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"boolval",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\BooleanType',
			    "validator"=>'com\servandserv\example\Model\BoolvalValidator',
				"prop"=>"_Boolval",
				"getter"=>"getBoolval",
				"setter"=>"setBoolval",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["8e296a067a37563370ded05f5a3bf3ec"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DateType',
			    "validator"=>'com\servandserv\example\Model\DtValidator',
				"prop"=>"_Dt",
				"getter"=>"getDt",
				"setter"=>"setDt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["4e732ced3463d06de0ca9a15b6153677"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dtt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DateTimeType',
			    "validator"=>'com\servandserv\example\Model\DttValidator',
				"prop"=>"_Dtt",
				"getter"=>"getDtt",
				"setter"=>"setDtt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["02e74f10e0327ad868d138f2b4fdd6f0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dur",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DurationType',
			    "validator"=>'com\servandserv\example\Model\DurValidator',
				"prop"=>"_Dur",
				"getter"=>"getDur",
				"setter"=>"setDur",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["33e75ff09dd601bbe69f351039152189"] = array(
			    "attribute"=>false,
			    "nodeName"=>"byte",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\ByteType',
			    "validator"=>'com\servandserv\example\Model\ByteValidator',
				"prop"=>"_Byte",
				"getter"=>"getByte",
				"setter"=>"setByte",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["6ea9ab1baa0efb9e19094440c317e21b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"short",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\ShortType',
			    "validator"=>'com\servandserv\example\Model\ShortValidator',
				"prop"=>"_Short",
				"getter"=>"getShort",
				"setter"=>"setShort",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["34173cb38f07f89ddbebc2ac9128303f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"int",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IntType',
			    "validator"=>'com\servandserv\example\Model\IntValidator',
				"prop"=>"_Int",
				"getter"=>"getInt",
				"setter"=>"setInt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["c16a5320fa475530d9583c34fd356ef5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"long",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\LongType',
			    "validator"=>'com\servandserv\example\Model\LongValidator',
				"prop"=>"_Long",
				"getter"=>"getLong",
				"setter"=>"setLong",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["6364d3f0f495b6ab9dcf8d3b5c6e0b01"] = array(
			    "attribute"=>false,
			    "nodeName"=>"integer",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IntegerType',
			    "validator"=>'com\servandserv\example\Model\IntegerValidator',
				"prop"=>"_Integer",
				"getter"=>"getInteger",
				"setter"=>"setInteger",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["182be0c5cdcd5072bb1864cdee4d3d6e"] = array(
			    "attribute"=>false,
			    "nodeName"=>"decimal",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DecimalType',
			    "validator"=>'com\servandserv\example\Model\DecimalValidator',
				"prop"=>"_Decimal",
				"getter"=>"getDecimal",
				"setter"=>"setDecimal",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["e369853df766fa44e1ed0ff613f563bd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"double",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DoubleType',
			    "validator"=>'com\servandserv\example\Model\DoubleValidator',
				"prop"=>"_Double",
				"getter"=>"getDouble",
				"setter"=>"setDouble",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1c383cd30b7c298ab50293adfecb7b18"] = array(
			    "attribute"=>false,
			    "nodeName"=>"float",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\FloatType',
			    "validator"=>'com\servandserv\example\Model\FloatValidator',
				"prop"=>"_Float",
				"getter"=>"getFloat",
				"setter"=>"setFloat",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["19ca14e7ea6328a42e0eb13d585e4c22"] = array(
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
			    
			$this->__props["a5bfc9e07964f8dddeb95fc584cd965d"] = array(
			    "attribute"=>true,
			    "nodeName"=>"ID",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IDType',
			    "validator"=>'com\servandserv\example\Model\IDValidator',
				"prop"=>"_ID",
				"getter"=>"getID",
				"setter"=>"setID",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "Model";
			$this->nodeName = "Model";
			$this->targetNS = "urn:com:servandserv:example";
			$this->classNS = "com:servandserv:example";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getProduct','product','1' );
			$this->assertMaxOccurs( 'getProduct','product','1' );
			$this->assertMinOccurs( 'getPrice','Price','1' );
			$this->assertMaxOccurs( 'getPrice','Price','1' );
			$this->assertMinOccurs( 'getStr','str','1' );
			$this->assertMaxOccurs( 'getStr','str','1' );
			$this->assertMinOccurs( 'getAnyURI','anyURI','1' );
			$this->assertMaxOccurs( 'getAnyURI','anyURI','1' );
			$this->assertMinOccurs( 'getLang','lang','1' );
			$this->assertMaxOccurs( 'getLang','lang','1' );
			$this->assertMinOccurs( 'getBoolval','boolval','1' );
			$this->assertMaxOccurs( 'getBoolval','boolval','1' );
			$this->assertMinOccurs( 'getDt','dt','1' );
			$this->assertMaxOccurs( 'getDt','dt','1' );
			$this->assertMinOccurs( 'getDtt','dtt','1' );
			$this->assertMaxOccurs( 'getDtt','dtt','1' );
			$this->assertMinOccurs( 'getDur','dur','1' );
			$this->assertMaxOccurs( 'getDur','dur','1' );
			$this->assertMinOccurs( 'getByte','byte','1' );
			$this->assertMaxOccurs( 'getByte','byte','1' );
			$this->assertMinOccurs( 'getShort','short','1' );
			$this->assertMaxOccurs( 'getShort','short','1' );
			$this->assertMinOccurs( 'getInt','int','1' );
			$this->assertMaxOccurs( 'getInt','int','1' );
			$this->assertMinOccurs( 'getLong','long','1' );
			$this->assertMaxOccurs( 'getLong','long','1' );
			$this->assertMinOccurs( 'getInteger','integer','1' );
			$this->assertMaxOccurs( 'getInteger','integer','1' );
			$this->assertMinOccurs( 'getDecimal','decimal','1' );
			$this->assertMaxOccurs( 'getDecimal','decimal','1' );
			$this->assertMinOccurs( 'getDouble','double','1' );
			$this->assertMaxOccurs( 'getDouble','double','1' );
			$this->assertMinOccurs( 'getFloat','float','1' );
			$this->assertMaxOccurs( 'getFloat','float','1' );
			$this->assertMinOccurs( 'getLink','Link','0' );
			$this->assertMaxOccurs( 'getLink','Link','unbounded' );
			$this->assertMinOccurs( 'getID','ID','1' );
			$this->assertMaxOccurs( 'getID','ID','1' );
		}
	}
	

