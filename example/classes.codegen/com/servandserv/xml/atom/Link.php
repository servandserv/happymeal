<?php
	namespace com\servandserv\xml\atom;
		
	class Link extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:xml:atom";
		const ROOT = "Link";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Rel = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Href = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var \StringType
		 */
		protected $_Type = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var \StringType
		 */
		protected $_Method = null;
		public function __construct() {
			parent::__construct();
			$this->__props["eccbc87e4b5ce2fe28308fd9f2a7baf3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rel",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Rel",
				"getter"=>"getRel",
				"setter"=>"setRel",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["a87ff679a2f3e71d9181a67b7542122c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"href",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Href",
				"getter"=>"getHref",
				"setter"=>"setHref",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["e4da3b7fbbce2345d7772b0674a318d5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"type",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Type",
				"getter"=>"getType",
				"setter"=>"setType",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["1679091c5a880faf6fb5e6087eb1b2dc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"method",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Method",
				"getter"=>"getMethod",
				"setter"=>"setMethod",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>0
			);
		}
		/**
		 * @param \StringType $val
		 */
		public function setRel (  $val ) {
			$this->_Rel = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setHref (  $val ) {
			$this->_Href = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setType (  $val ) {
			$this->_Type = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setMethod (  $val ) {
			$this->_Method = $val;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getRel() {
			return $this->_Rel;
		}
		/**
		 * @return \StringType
		 */
		public function getHref() {
			return $this->_Href;
		}
		/**
		 * @return \StringType
		 */
		public function getType() {
			return $this->_Type;
		}
		/**
		 * @return \StringType
		 */
		public function getMethod() {
			return $this->_Method;
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\xml\atom\LinkValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

