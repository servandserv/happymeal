<?php
	namespace com\servandserv\example;
		
	class Model extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:example";
		const ROOT = "Model";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Product = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\example\PriceType
		 */
		protected $_Price = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Str = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \AnyURIType
		 */
		protected $_AnyURI = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \LanguageType
		 */
		protected $_Lang = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \BooleanType
		 */
		protected $_Boolval = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \DateType
		 */
		protected $_Dt = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \DateTimeType
		 */
		protected $_Dtt = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \DurationType
		 */
		protected $_Dur = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \ByteType
		 */
		protected $_Byte = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \ShortType
		 */
		protected $_Short = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \IntType
		 */
		protected $_Int = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \LongType
		 */
		protected $_Long = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \IntegerType
		 */
		protected $_Integer = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \DecimalType
		 */
		protected $_Decimal = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \DoubleType
		 */
		protected $_Double = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \FloatType
		 */
		protected $_Float = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\xml\atom\Link
		 */
		protected $_Link = [];
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \IDType
		 */
		protected $_ID = null;
		public function __construct() {
			parent::__construct();
			$this->__props["1f0e3dad99908345f7439f8ffabdffc4"] = array(
			    "attribute"=>false,
			    "nodeName"=>"product",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Product",
				"getter"=>"getProduct",
				"setter"=>"setProduct",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["98f13708210194c475687be6106a3b84"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Price",
			    "class"=>'com\servandserv\example\Model\Price',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Price",
				"getter"=>"getPrice",
				"setter"=>"setPrice",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["3c59dc048e8850243be8079a5c74d079"] = array(
			    "attribute"=>false,
			    "nodeName"=>"str",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Str",
				"getter"=>"getStr",
				"setter"=>"setStr",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["b6d767d2f8ed5d21a44b0e5886680cb9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"anyURI",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyURIType',
				"prop"=>"_AnyURI",
				"getter"=>"getAnyURI",
				"setter"=>"setAnyURI",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["37693cfc748049e45d87b8c7d8b9aacd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"lang",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\LanguageType',
				"prop"=>"_Lang",
				"getter"=>"getLang",
				"setter"=>"setLang",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["1ff1de774005f8da13f42943881c655f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"boolval",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\BooleanType',
				"prop"=>"_Boolval",
				"getter"=>"getBoolval",
				"setter"=>"setBoolval",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["8e296a067a37563370ded05f5a3bf3ec"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DateType',
				"prop"=>"_Dt",
				"getter"=>"getDt",
				"setter"=>"setDt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["4e732ced3463d06de0ca9a15b6153677"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dtt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DateTimeType',
				"prop"=>"_Dtt",
				"getter"=>"getDtt",
				"setter"=>"setDtt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["02e74f10e0327ad868d138f2b4fdd6f0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dur",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DurationType',
				"prop"=>"_Dur",
				"getter"=>"getDur",
				"setter"=>"setDur",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["33e75ff09dd601bbe69f351039152189"] = array(
			    "attribute"=>false,
			    "nodeName"=>"byte",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\ByteType',
				"prop"=>"_Byte",
				"getter"=>"getByte",
				"setter"=>"setByte",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["6ea9ab1baa0efb9e19094440c317e21b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"short",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\ShortType',
				"prop"=>"_Short",
				"getter"=>"getShort",
				"setter"=>"setShort",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["34173cb38f07f89ddbebc2ac9128303f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"int",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IntType',
				"prop"=>"_Int",
				"getter"=>"getInt",
				"setter"=>"setInt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["c16a5320fa475530d9583c34fd356ef5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"long",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\LongType',
				"prop"=>"_Long",
				"getter"=>"getLong",
				"setter"=>"setLong",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["6364d3f0f495b6ab9dcf8d3b5c6e0b01"] = array(
			    "attribute"=>false,
			    "nodeName"=>"integer",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IntegerType',
				"prop"=>"_Integer",
				"getter"=>"getInteger",
				"setter"=>"setInteger",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["182be0c5cdcd5072bb1864cdee4d3d6e"] = array(
			    "attribute"=>false,
			    "nodeName"=>"decimal",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DecimalType',
				"prop"=>"_Decimal",
				"getter"=>"getDecimal",
				"setter"=>"setDecimal",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["e369853df766fa44e1ed0ff613f563bd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"double",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DoubleType',
				"prop"=>"_Double",
				"getter"=>"getDouble",
				"setter"=>"setDouble",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["1c383cd30b7c298ab50293adfecb7b18"] = array(
			    "attribute"=>false,
			    "nodeName"=>"float",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\FloatType',
				"prop"=>"_Float",
				"getter"=>"getFloat",
				"setter"=>"setFloat",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["19ca14e7ea6328a42e0eb13d585e4c22"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Link",
			    "class"=>'com\servandserv\xml\atom\Link',
			    "classNS"=>'com\servandserv\xml\atom',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Link",
				"getter"=>"getLink",
				"setter"=>"setLink",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"true",
				"minOccurs"=>0
			);
			$this->__props["a5bfc9e07964f8dddeb95fc584cd965d"] = array(
			    "attribute"=>true,
			    "nodeName"=>"ID",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IDType',
				"prop"=>"_ID",
				"getter"=>"getID",
				"setter"=>"setID",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
		}
		/**
		 * @param \StringType $val
		 */
		public function setProduct (  $val ) {
			$this->_Product = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\example\PriceType $val
		 */
		public function setPrice ( \com\servandserv\example\PriceType $val ) {
			$this->_Price = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setStr (  $val ) {
			$this->_Str = $val;
			return $this;
		}
		/**
		 * @param \AnyURIType $val
		 */
		public function setAnyURI (  $val ) {
			$this->_AnyURI = $val;
			return $this;
		}
		/**
		 * @param \LanguageType $val
		 */
		public function setLang (  $val ) {
			$this->_Lang = $val;
			return $this;
		}
		/**
		 * @param \BooleanType $val
		 */
		public function setBoolval (  $val ) {
			$this->_Boolval = $val;
			return $this;
		}
		/**
		 * @param \DateType $val
		 */
		public function setDt (  $val ) {
			$this->_Dt = $val;
			return $this;
		}
		/**
		 * @param \DateTimeType $val
		 */
		public function setDtt (  $val ) {
			$this->_Dtt = $val;
			return $this;
		}
		/**
		 * @param \DurationType $val
		 */
		public function setDur (  $val ) {
			$this->_Dur = $val;
			return $this;
		}
		/**
		 * @param \ByteType $val
		 */
		public function setByte (  $val ) {
			$this->_Byte = $val;
			return $this;
		}
		/**
		 * @param \ShortType $val
		 */
		public function setShort (  $val ) {
			$this->_Short = $val;
			return $this;
		}
		/**
		 * @param \IntType $val
		 */
		public function setInt (  $val ) {
			$this->_Int = $val;
			return $this;
		}
		/**
		 * @param \LongType $val
		 */
		public function setLong (  $val ) {
			$this->_Long = $val;
			return $this;
		}
		/**
		 * @param \IntegerType $val
		 */
		public function setInteger (  $val ) {
			$this->_Integer = $val;
			return $this;
		}
		/**
		 * @param \DecimalType $val
		 */
		public function setDecimal (  $val ) {
			$this->_Decimal = $val;
			return $this;
		}
		/**
		 * @param \DoubleType $val
		 */
		public function setDouble (  $val ) {
			$this->_Double = $val;
			return $this;
		}
		/**
		 * @param \FloatType $val
		 */
		public function setFloat (  $val ) {
			$this->_Float = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\xml\atom\Link $val
		 */
		public function setLink ( \com\servandserv\xml\atom\Link $val ) {
			$this->_Link[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\xml\atom\Link[]
		 */
		public function setLinkArray ( array $vals = []  ) {
			$this->_Link = $vals;
			return $this;
		}
		/**
		 * @param \IDType $val
		 */
		public function setID (  $val ) {
			$this->_ID = $val;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getProduct() {
			return $this->_Product;
		}
		/**
		 * @return com\servandserv\example\PriceType
		 */
		public function getPrice() {
			return $this->_Price;
		}
		/**
		 * @return \StringType
		 */
		public function getStr() {
			return $this->_Str;
		}
		/**
		 * @return \AnyURIType
		 */
		public function getAnyURI() {
			return $this->_AnyURI;
		}
		/**
		 * @return \LanguageType
		 */
		public function getLang() {
			return $this->_Lang;
		}
		/**
		 * @return \BooleanType
		 */
		public function getBoolval() {
			return $this->_Boolval;
		}
		/**
		 * @return \DateType
		 */
		public function getDt() {
			return $this->_Dt;
		}
		/**
		 * @return \DateTimeType
		 */
		public function getDtt() {
			return $this->_Dtt;
		}
		/**
		 * @return \DurationType
		 */
		public function getDur() {
			return $this->_Dur;
		}
		/**
		 * @return \ByteType
		 */
		public function getByte() {
			return $this->_Byte;
		}
		/**
		 * @return \ShortType
		 */
		public function getShort() {
			return $this->_Short;
		}
		/**
		 * @return \IntType
		 */
		public function getInt() {
			return $this->_Int;
		}
		/**
		 * @return \LongType
		 */
		public function getLong() {
			return $this->_Long;
		}
		/**
		 * @return \IntegerType
		 */
		public function getInteger() {
			return $this->_Integer;
		}
		/**
		 * @return \DecimalType
		 */
		public function getDecimal() {
			return $this->_Decimal;
		}
		/**
		 * @return \DoubleType
		 */
		public function getDouble() {
			return $this->_Double;
		}
		/**
		 * @return \FloatType
		 */
		public function getFloat() {
			return $this->_Float;
		}
		/**
		 * @return com\servandserv\xml\atom\Link | []
		 */
		public function getLink($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Link[$index]) ? $this->_Link[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Link, $cb));
			} else {
				$res = $this->_Link;
			}
			return $res;
		}
		/**
		 * @return \IDType
		 */
		public function getID() {
			return $this->_ID;
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\example\ModelValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

