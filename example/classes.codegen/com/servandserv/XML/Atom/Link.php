<?php
	namespace com\servandserv\XML\Atom;
		
	class Link extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:XML:Atom:Link";
		const ROOT = "Link";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $_Rel = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $_Href = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var \String
		 */
		protected $_Type = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var \String
		 */
		protected $_Method = null;
		public function __construct() {
			parent::__construct();
			$this->__props["c4ca4238a0b923820dcc509a6f75849b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rel",
			    "class"=>'',
			    "classNS"=>'com\servandserv\XML\Atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Rel",
				"getter"=>"getRel",
				"setter"=>"setRel",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["c81e728d9d4c2f636f067f89cc14862c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"href",
			    "class"=>'',
			    "classNS"=>'com\servandserv\XML\Atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Href",
				"getter"=>"getHref",
				"setter"=>"setHref",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["eccbc87e4b5ce2fe28308fd9f2a7baf3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"type",
			    "class"=>'',
			    "classNS"=>'com\servandserv\XML\Atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Type",
				"getter"=>"getType",
				"setter"=>"setType",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["a87ff679a2f3e71d9181a67b7542122c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"method",
			    "class"=>'',
			    "classNS"=>'com\servandserv\XML\Atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Method",
				"getter"=>"getMethod",
				"setter"=>"setMethod",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>0
			);
		}
		/**
		 * @param \String $val
		 */
		public function setRel (  $val ) {
			$this->_Rel = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setHref (  $val ) {
			$this->_Href = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setType (  $val ) {
			$this->_Type = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setMethod (  $val ) {
			$this->_Method = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getRel() {
			return $this->_Rel;
		}
		/**
		 * @return \String
		 */
		public function getHref() {
			return $this->_Href;
		}
		/**
		 * @return \String
		 */
		public function getType() {
			return $this->_Type;
		}
		/**
		 * @return \String
		 */
		public function getMethod() {
			return $this->_Method;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\XML\Atom\LinkValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

