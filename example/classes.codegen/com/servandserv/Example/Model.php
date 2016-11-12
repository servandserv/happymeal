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
		protected $Product = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\Example\Model\Price
		 */
		protected $Price = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $Str = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Byte
		 */
		protected $Byte = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\XML\Atom\Link
		 */
		protected $Link = [];
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $ID = null;
		public function __construct() {
			parent::__construct();
			$this->__props["c51ce410c124a10e0db5e4b97fc2af39"] = array(
			    "attribute"=>false,
			    "nodeName"=>"product",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Product",
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
			    "class"=>"com\servandserv\Example\Model\Price",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
				"prop"=>"Price",
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
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Str",
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
			    "nodeName"=>"byte",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Byte",
				"prop"=>"Byte",
				"getter"=>"getByte",
				"setter"=>"setByte",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["70efdf2ec9b086079795c442636b55fb"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Link",
			    "class"=>"com\servandserv\XML\Atom\Link",
			    "classNS"=>"com\servandserv\XML\Atom",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
				"prop"=>"Link",
				"getter"=>"getLink",
				"setter"=>"setLink",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"true",
				"minOccurs"=>0
			);
			$this->__props["6f4922f45568161a8cdf4ad2299f6d23"] = array(
			    "attribute"=>true,
			    "nodeName"=>"ID",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"ID",
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
			$this->Product = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\Example\Model\Price $val
		 */
		public function setPrice ( \com\servandserv\Example\Model\Price $val ) {
			$this->Price = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setStr (  $val ) {
			$this->Str = $val;
			return $this;
		}
		/**
		 * @param \Byte $val
		 */
		public function setByte (  $val ) {
			$this->Byte = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\XML\Atom\Link $val
		 */
		public function setLink ( \com\servandserv\XML\Atom\Link $val ) {
			$this->Link[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\XML\Atom\Link[]
		 */
		public function setLinkArray ( array $vals ) {
			$this->Link = $vals;
			//$this->_properties["Link"]["text"] = $vals;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setID (  $val ) {
			$this->ID = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getProduct() {
			return $this->Product;
		}
		/**
		 * @return com\servandserv\Example\Model\Price
		 */
		public function getPrice() {
			return $this->Price;
		}
		/**
		 * @return \String
		 */
		public function getStr() {
			return $this->Str;
		}
		/**
		 * @return \Byte
		 */
		public function getByte() {
			return $this->Byte;
		}
		/**
		 * @return com\servandserv\XML\Atom\Link | []
		 */
		public function getLink($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->Link[$index]) ? $this->Link[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->Link, $cb));
			} else {
				$res = $this->Link;
			}
			return $res;
		}
		/**
		 * @return \String
		 */
		public function getID() {
			return $this->ID;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\Example\ModelValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

