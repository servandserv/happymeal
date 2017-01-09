<?php
	namespace com\servandserv\happymeal\views;
		
	/**
	 * Use TokenType for temporary data (manage user interface flow)
	 * 
	 */
	class TokenType extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "TokenType";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Id = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \IntegerType
		 */
		protected $_Created = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\happymeal\views\Request
		 */
		protected $_Request = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\happymeal\Errors
		 */
		protected $_Errors = [];
		public function __construct() {
			parent::__construct();
			$this->__props["38b3eff8baf56627478ec76a704e9b52"] = array(
			    "attribute"=>false,
			    "nodeName"=>"id",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\TokenType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Id",
				"getter"=>"getId",
				"setter"=>"setId",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["ec8956637a99787bd197eacd77acce5e"] = array(
			    "attribute"=>false,
			    "nodeName"=>"created",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\TokenType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IntegerType',
				"prop"=>"_Created",
				"getter"=>"getCreated",
				"setter"=>"setCreated",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["6974ce5ac660610b44d9b9fed0ff9548"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Request",
			    "class"=>'com\servandserv\happymeal\views\Request',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Request",
				"getter"=>"getRequest",
				"setter"=>"setRequest",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["c9e1074f5b3f9fc8ea15d152add07294"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Errors",
			    "class"=>'com\servandserv\happymeal\Errors',
			    "classNS"=>'com\servandserv\happymeal',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Errors",
				"getter"=>"getErrors",
				"setter"=>"setErrors",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"true",
				"minOccurs"=>0
			);
		}
		/**
		 * @param \StringType $val
		 */
		public function setId (  $val ) {
			$this->_Id = $val;
			return $this;
		}
		/**
		 * @param \IntegerType $val
		 */
		public function setCreated (  $val ) {
			$this->_Created = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\Request $val
		 */
		public function setRequest ( \com\servandserv\happymeal\views\Request $val ) {
			$this->_Request = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\Errors $val
		 */
		public function setErrors ( \com\servandserv\happymeal\Errors $val ) {
			$this->_Errors[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\Errors[]
		 */
		public function setErrorsArray ( array $vals = []  ) {
			$this->_Errors = $vals;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getId() {
			return $this->_Id;
		}
		/**
		 * @return \IntegerType
		 */
		public function getCreated() {
			return $this->_Created;
		}
		/**
		 * @return com\servandserv\happymeal\views\Request
		 */
		public function getRequest() {
			return $this->_Request;
		}
		/**
		 * @return com\servandserv\happymeal\Errors | []
		 */
		public function getErrors($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Errors[$index]) ? $this->_Errors[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Errors, $cb));
			} else {
				$res = $this->_Errors;
			}
			return $res;
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\views\TokenTypeValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

