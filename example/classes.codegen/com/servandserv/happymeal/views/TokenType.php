<?php
	namespace com\servandserv\happymeal\views;
		
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
		 * @var \StringType
		 */
		protected $_Url = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\happymeal\Errors
		 */
		protected $_Errors = [];
		public function __construct() {
			parent::__construct();
			$this->__props["093f65e080a295f8076b1c5722a46aa2"] = array(
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
			$this->__props["072b030ba126b2f4b2374f342be9ed44"] = array(
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
			$this->__props["7f39f8317fbdb1988ef4c628eba02591"] = array(
			    "attribute"=>false,
			    "nodeName"=>"url",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\TokenType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Url",
				"getter"=>"getUrl",
				"setter"=>"setUrl",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["44f683a84163b3523afe57c2e008bc8c"] = array(
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
		 * @param \StringType $val
		 */
		public function setUrl (  $val ) {
			$this->_Url = $val;
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
		public function setErrorsArray ( array $vals ) {
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
		 * @return \StringType
		 */
		public function getUrl() {
			return $this->_Url;
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
	}
