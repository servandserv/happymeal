<?php
	namespace com\servandserv\happymeal\errors;
		
	class Error extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:errors";
		const ROOT = "Error";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 Every error could linked to object with the same namespace
		 * @var \String
		 */
		protected $TargetNS = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Every error could linked to object property with the same name and namespace
		 * @var \String
		 */
		protected $Name = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Property value. NULL if value object
		 * @var \String
		 */
		protected $Value = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 Validation rule code.
		 * @var \String
		 */
		protected $Rule = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Compared value with.
		 * @var \String
		 */
		protected $Assertion = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Readable error description.
		 * @var \String
		 */
		protected $Description = null;
		public function __construct() {
			parent::__construct();
			$this->__props["c4ca4238a0b923820dcc509a6f75849b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"targetNS",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"TargetNS",
				"getter"=>"getTargetNS",
				"setter"=>"setTargetNS",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["c81e728d9d4c2f636f067f89cc14862c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"name",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Name",
				"getter"=>"getName",
				"setter"=>"setName",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["eccbc87e4b5ce2fe28308fd9f2a7baf3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["a87ff679a2f3e71d9181a67b7542122c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rule",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Rule",
				"getter"=>"getRule",
				"setter"=>"setRule",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["e4da3b7fbbce2345d7772b0674a318d5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"assertion",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Assertion",
				"getter"=>"getAssertion",
				"setter"=>"setAssertion",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["1679091c5a880faf6fb5e6087eb1b2dc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"description",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
				"prop"=>"Description",
				"getter"=>"getDescription",
				"setter"=>"setDescription",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>0
			);
		}
		/**
		 * @param \String $val
		 */
		public function setTargetNS (  $val ) {
			$this->TargetNS = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setName (  $val ) {
			$this->Name = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setValue (  $val ) {
			$this->Value = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setRule (  $val ) {
			$this->Rule = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setAssertion (  $val ) {
			$this->Assertion = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setDescription (  $val ) {
			$this->Description = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getTargetNS() {
			return $this->TargetNS;
		}
		/**
		 * @return \String
		 */
		public function getName() {
			return $this->Name;
		}
		/**
		 * @return \String
		 */
		public function getValue() {
			return $this->Value;
		}
		/**
		 * @return \String
		 */
		public function getRule() {
			return $this->Rule;
		}
		/**
		 * @return \String
		 */
		public function getAssertion() {
			return $this->Assertion;
		}
		/**
		 * @return \String
		 */
		public function getDescription() {
			return $this->Description;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\errors\ErrorValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

