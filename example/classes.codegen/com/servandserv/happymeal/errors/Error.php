<?php
	namespace com\servandserv\happymeal\errors;
		
	class Error extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:errors";
		const ROOT = "Error";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 Every error could linked to object with the same namespace
		 * @var \StringType
		 */
		protected $_TargetNS = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 Full property owner namespace
		 * @var \StringType
		 */
		protected $_ClassNS = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Every error could linked to object property with the same name and namespace
		 * @var \StringType
		 */
		protected $_Name = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Property value. NULL if value object
		 * @var \StringType
		 */
		protected $_Value = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 Validation rule code.
		 * @var \StringType
		 */
		protected $_Rule = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Compared value with.
		 * @var \StringType
		 */
		protected $_Assertion = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 Readable error description.
		 * @var \StringType
		 */
		protected $_Description = null;
		public function __construct() {
			parent::__construct();
			$this->__props["a684eceee76fc522773286a895bc8436"] = array(
			    "attribute"=>false,
			    "nodeName"=>"targetNS",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_TargetNS",
				"getter"=>"getTargetNS",
				"setter"=>"setTargetNS",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["72b32a1f754ba1c09b3695e0cb6cde7f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"classNS",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_ClassNS",
				"getter"=>"getClassNS",
				"setter"=>"setClassNS",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["072b030ba126b2f4b2374f342be9ed44"] = array(
			    "attribute"=>false,
			    "nodeName"=>"name",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Name",
				"getter"=>"getName",
				"setter"=>"setName",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["03afdbd66e7929b125f8597834fa83a4"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["3295c76acbf4caaed33c36b1b5fc2cb1"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rule",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Rule",
				"getter"=>"getRule",
				"setter"=>"setRule",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["14bfa6bb14875e45bba028a21ed38046"] = array(
			    "attribute"=>false,
			    "nodeName"=>"assertion",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Assertion",
				"getter"=>"getAssertion",
				"setter"=>"setAssertion",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["32bb90e8976aab5298d5da10fe66f21d"] = array(
			    "attribute"=>false,
			    "nodeName"=>"description",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Description",
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
		 * @param \StringType $val
		 */
		public function setTargetNS (  $val ) {
			$this->_TargetNS = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setClassNS (  $val ) {
			$this->_ClassNS = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setName (  $val = NULL ) {
			$this->_Name = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setValue (  $val = NULL ) {
			$this->_Value = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setRule (  $val ) {
			$this->_Rule = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setAssertion (  $val = NULL ) {
			$this->_Assertion = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setDescription (  $val = NULL ) {
			$this->_Description = $val;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getTargetNS() {
			return $this->_TargetNS;
		}
		/**
		 * @return \StringType
		 */
		public function getClassNS() {
			return $this->_ClassNS;
		}
		/**
		 * @return \StringType
		 */
		public function getName() {
			return $this->_Name;
		}
		/**
		 * @return \StringType
		 */
		public function getValue() {
			return $this->_Value;
		}
		/**
		 * @return \StringType
		 */
		public function getRule() {
			return $this->_Rule;
		}
		/**
		 * @return \StringType
		 */
		public function getAssertion() {
			return $this->_Assertion;
		}
		/**
		 * @return \StringType
		 */
		public function getDescription() {
			return $this->_Description;
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\errors\ErrorValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

