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
		protected $Value = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $Units = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\XML\Atom\Link
		 */
		protected $Link = [];
		public function __construct() {
			parent::__construct();
			$this->__props["98f13708210194c475687be6106a3b84"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model\PriceType",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\Decimal",
				"prop"=>"Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["3c59dc048e8850243be8079a5c74d079"] = array(
			    "attribute"=>false,
			    "nodeName"=>"units",
			    "class"=>"",
			    "classNS"=>"com\servandserv\Example\Model\PriceType",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Units",
				"getter"=>"getUnits",
				"setter"=>"setUnits",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:Example:Model",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["b6d767d2f8ed5d21a44b0e5886680cb9"] = array(
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
		}
		/**
		 * @param \Decimal $val
		 */
		public function setValue (  $val ) {
			$this->Value = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setUnits (  $val ) {
			$this->Units = $val;
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
		 * @return \Decimal
		 */
		public function getValue() {
			return $this->Value;
		}
		/**
		 * @return \String
		 */
		public function getUnits() {
			return $this->Units;
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
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\Example\Model\PriceTypeValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

