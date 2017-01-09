<?php
	namespace com\servandserv\example;
		
	class PriceType extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:example";
		const ROOT = "priceType";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \DecimalType
		 */
		protected $_Value = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Units = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\xml\atom\Link
		 */
		protected $_Link = [];
		public function __construct() {
			parent::__construct();
			$this->__props["d645920e395fedad7bbbed0eca3fe2e0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\PriceType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\DecimalType',
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["3416a75f4cea9109507cacd8e2f2aefc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"units",
			    "class"=>'',
			    "classNS"=>'com\servandserv\example\PriceType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Units",
				"getter"=>"getUnits",
				"setter"=>"setUnits",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:example",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["a1d0c6e83f027327d8461063f4ac58a6"] = array(
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
		}
		/**
		 * @param \DecimalType $val
		 */
		public function setValue (  $val ) {
			$this->_Value = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setUnits (  $val ) {
			$this->_Units = $val;
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
		 * @return \DecimalType
		 */
		public function getValue() {
			return $this->_Value;
		}
		/**
		 * @return \StringType
		 */
		public function getUnits() {
			return $this->_Units;
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
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\example\PriceTypeValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

