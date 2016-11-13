<?php
	namespace com\servandserv\Example;
		
	class Model extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:Example:Model";
		const ROOT = "Model";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $_Product = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\Example\Model\Price
		 */
		protected $_Price = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $_Str = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \AnyURI
		 */
		protected $_AnyURI = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Language
		 */
		protected $_Lang = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Boolean
		 */
		protected $_Boolval = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Date
		 */
		protected $_Dt = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \DateTime
		 */
		protected $_Dtt = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Duration
		 */
		protected $_Dur = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Byte
		 */
		protected $_Byte = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Short
		 */
		protected $_Short = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Int
		 */
		protected $_Int = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Long
		 */
		protected $_Long = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Integer
		 */
		protected $_Integer = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Decimal
		 */
		protected $_Decimal = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Double
		 */
		protected $_Double = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Float
		 */
		protected $_Float = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\XML\Atom\Link
		 */
		protected $_Link = [];
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \ID
		 */
		protected $_ID = null;
		public function __construct() {
			parent::__construct();
			$this->__props["c51ce410c124a10e0db5e4b97fc2af39"] = array(
			    "attribute"=>false,
			    "nodeName"=>"product",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Product",
				"getter"=>"getProduct",
				"setter"=>"setProduct",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["aab3238922bcc25a6f606eb525ffdc56"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Price",
			    "class"=>'com\servandserv\Example\Model\Price',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Price",
				"getter"=>"getPrice",
				"setter"=>"setPrice",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["9bf31c7ff062936a96d3c8bd1f8f2ff3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"str",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Str",
				"getter"=>"getStr",
				"setter"=>"setStr",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["c74d97b01eae257e44aa9d5bade97baf"] = array(
			    "attribute"=>false,
			    "nodeName"=>"anyURI",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyURI',
				"prop"=>"_AnyURI",
				"getter"=>"getAnyURI",
				"setter"=>"setAnyURI",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["70efdf2ec9b086079795c442636b55fb"] = array(
			    "attribute"=>false,
			    "nodeName"=>"lang",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Language',
				"prop"=>"_Lang",
				"getter"=>"getLang",
				"setter"=>"setLang",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["6f4922f45568161a8cdf4ad2299f6d23"] = array(
			    "attribute"=>false,
			    "nodeName"=>"boolval",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Boolean',
				"prop"=>"_Boolval",
				"getter"=>"getBoolval",
				"setter"=>"setBoolval",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["1f0e3dad99908345f7439f8ffabdffc4"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Date',
				"prop"=>"_Dt",
				"getter"=>"getDt",
				"setter"=>"setDt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["98f13708210194c475687be6106a3b84"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dtt",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DateTime',
				"prop"=>"_Dtt",
				"getter"=>"getDtt",
				"setter"=>"setDtt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["3c59dc048e8850243be8079a5c74d079"] = array(
			    "attribute"=>false,
			    "nodeName"=>"dur",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Duration',
				"prop"=>"_Dur",
				"getter"=>"getDur",
				"setter"=>"setDur",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["b6d767d2f8ed5d21a44b0e5886680cb9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"byte",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Byte',
				"prop"=>"_Byte",
				"getter"=>"getByte",
				"setter"=>"setByte",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["37693cfc748049e45d87b8c7d8b9aacd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"short",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Short',
				"prop"=>"_Short",
				"getter"=>"getShort",
				"setter"=>"setShort",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["1ff1de774005f8da13f42943881c655f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"int",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Int',
				"prop"=>"_Int",
				"getter"=>"getInt",
				"setter"=>"setInt",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["8e296a067a37563370ded05f5a3bf3ec"] = array(
			    "attribute"=>false,
			    "nodeName"=>"long",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Long',
				"prop"=>"_Long",
				"getter"=>"getLong",
				"setter"=>"setLong",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["4e732ced3463d06de0ca9a15b6153677"] = array(
			    "attribute"=>false,
			    "nodeName"=>"integer",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Integer',
				"prop"=>"_Integer",
				"getter"=>"getInteger",
				"setter"=>"setInteger",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["02e74f10e0327ad868d138f2b4fdd6f0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"decimal",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Decimal',
				"prop"=>"_Decimal",
				"getter"=>"getDecimal",
				"setter"=>"setDecimal",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["33e75ff09dd601bbe69f351039152189"] = array(
			    "attribute"=>false,
			    "nodeName"=>"double",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Double',
				"prop"=>"_Double",
				"getter"=>"getDouble",
				"setter"=>"setDouble",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["6ea9ab1baa0efb9e19094440c317e21b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"float",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Float',
				"prop"=>"_Float",
				"getter"=>"getFloat",
				"setter"=>"setFloat",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["34173cb38f07f89ddbebc2ac9128303f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Link",
			    "class"=>'com\servandserv\XML\Atom\Link',
			    "classNS"=>'com\servandserv\XML\Atom',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Link",
				"getter"=>"getLink",
				"setter"=>"setLink",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"true",
				"minOccurs"=>0
			);
			$this->__props["c16a5320fa475530d9583c34fd356ef5"] = array(
			    "attribute"=>true,
			    "nodeName"=>"ID",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\ID',
				"prop"=>"_ID",
				"getter"=>"getID",
				"setter"=>"setID",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
		}
		/**
		 * @param \String $val
		 */
		public function setProduct (  $val ) {
			$this->_Product = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\Example\Model\Price $val
		 */
		public function setPrice ( \com\servandserv\Example\Model\Price $val ) {
			$this->_Price = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setStr (  $val ) {
			$this->_Str = $val;
			return $this;
		}
		/**
		 * @param \AnyURI $val
		 */
		public function setAnyURI (  $val ) {
			$this->_AnyURI = $val;
			return $this;
		}
		/**
		 * @param \Language $val
		 */
		public function setLang (  $val ) {
			$this->_Lang = $val;
			return $this;
		}
		/**
		 * @param \Boolean $val
		 */
		public function setBoolval (  $val ) {
			$this->_Boolval = $val;
			return $this;
		}
		/**
		 * @param \Date $val
		 */
		public function setDt (  $val ) {
			$this->_Dt = $val;
			return $this;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setDtt (  $val ) {
			$this->_Dtt = $val;
			return $this;
		}
		/**
		 * @param \Duration $val
		 */
		public function setDur (  $val ) {
			$this->_Dur = $val;
			return $this;
		}
		/**
		 * @param \Byte $val
		 */
		public function setByte (  $val ) {
			$this->_Byte = $val;
			return $this;
		}
		/**
		 * @param \Short $val
		 */
		public function setShort (  $val ) {
			$this->_Short = $val;
			return $this;
		}
		/**
		 * @param \Int $val
		 */
		public function setInt (  $val ) {
			$this->_Int = $val;
			return $this;
		}
		/**
		 * @param \Long $val
		 */
		public function setLong (  $val ) {
			$this->_Long = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setInteger (  $val ) {
			$this->_Integer = $val;
			return $this;
		}
		/**
		 * @param \Decimal $val
		 */
		public function setDecimal (  $val ) {
			$this->_Decimal = $val;
			return $this;
		}
		/**
		 * @param \Double $val
		 */
		public function setDouble (  $val ) {
			$this->_Double = $val;
			return $this;
		}
		/**
		 * @param \Float $val
		 */
		public function setFloat (  $val ) {
			$this->_Float = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\XML\Atom\Link $val
		 */
		public function setLink ( \com\servandserv\XML\Atom\Link $val ) {
			$this->_Link[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\XML\Atom\Link[]
		 */
		public function setLinkArray ( array $vals ) {
			$this->_Link = $vals;
			return $this;
		}
		/**
		 * @param \ID $val
		 */
		public function setID (  $val ) {
			$this->_ID = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getProduct() {
			return $this->_Product;
		}
		/**
		 * @return com\servandserv\Example\Model\Price
		 */
		public function getPrice() {
			return $this->_Price;
		}
		/**
		 * @return \String
		 */
		public function getStr() {
			return $this->_Str;
		}
		/**
		 * @return \AnyURI
		 */
		public function getAnyURI() {
			return $this->_AnyURI;
		}
		/**
		 * @return \Language
		 */
		public function getLang() {
			return $this->_Lang;
		}
		/**
		 * @return \Boolean
		 */
		public function getBoolval() {
			return $this->_Boolval;
		}
		/**
		 * @return \Date
		 */
		public function getDt() {
			return $this->_Dt;
		}
		/**
		 * @return \DateTime
		 */
		public function getDtt() {
			return $this->_Dtt;
		}
		/**
		 * @return \Duration
		 */
		public function getDur() {
			return $this->_Dur;
		}
		/**
		 * @return \Byte
		 */
		public function getByte() {
			return $this->_Byte;
		}
		/**
		 * @return \Short
		 */
		public function getShort() {
			return $this->_Short;
		}
		/**
		 * @return \Int
		 */
		public function getInt() {
			return $this->_Int;
		}
		/**
		 * @return \Long
		 */
		public function getLong() {
			return $this->_Long;
		}
		/**
		 * @return \Integer
		 */
		public function getInteger() {
			return $this->_Integer;
		}
		/**
		 * @return \Decimal
		 */
		public function getDecimal() {
			return $this->_Decimal;
		}
		/**
		 * @return \Double
		 */
		public function getDouble() {
			return $this->_Double;
		}
		/**
		 * @return \Float
		 */
		public function getFloat() {
			return $this->_Float;
		}
		/**
		 * @return com\servandserv\XML\Atom\Link | []
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
		 * @return \ID
		 */
		public function getID() {
			return $this->_ID;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\Example\ModelValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

