<?php
	namespace com\servandserv\Example\Model;
		
	class PriceType extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:Example:Model";
		const ROOT = "priceType";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Decimal
		 */
		protected $_Value = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $_Units = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\XML\Atom\Link
		 */
		protected $_Link = [];
		public function __construct() {
			parent::__construct();
			$this->__props["182be0c5cdcd5072bb1864cdee4d3d6e"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model\PriceType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Decimal',
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["e369853df766fa44e1ed0ff613f563bd"] = array(
			    "attribute"=>false,
			    "nodeName"=>"units",
			    "class"=>'',
			    "classNS"=>'com\servandserv\Example\Model\PriceType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Units",
				"getter"=>"getUnits",
				"setter"=>"setUnits",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["1c383cd30b7c298ab50293adfecb7b18"] = array(
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
		}
		/**
		 * @param \Decimal $val
		 */
		public function setValue (  $val ) {
			$this->_Value = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setUnits (  $val ) {
			$this->_Units = $val;
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
		 * @return \Decimal
		 */
		public function getValue() {
			return $this->_Value;
		}
		/**
		 * @return \String
		 */
		public function getUnits() {
			return $this->_Units;
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
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\Example\Model\PriceTypeValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

