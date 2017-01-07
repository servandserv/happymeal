<?php
	namespace com\servandserv\happymeal\views;
		
	class Request extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Request";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Method = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Url = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\happymeal\views\Param
		 */
		protected $_Param = [];
		public function __construct() {
			parent::__construct();
			$this->__props["f457c545a9ded88f18ecee47145a72c0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"method",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Request',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Method",
				"getter"=>"getMethod",
				"setter"=>"setMethod",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["c0c7c76d30bd3dcaefc96f40275bdc0a"] = array(
			    "attribute"=>false,
			    "nodeName"=>"url",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Request',
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
			$this->__props["2838023a778dfaecdc212708f721b788"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Param",
			    "class"=>'com\servandserv\happymeal\views\Param',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Param",
				"getter"=>"getParam",
				"setter"=>"setParam",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"true",
				"minOccurs"=>0
			);
		}
		/**
		 * @param \StringType $val
		 */
		public function setMethod (  $val ) {
			$this->_Method = $val;
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
		 * @param com\servandserv\happymeal\views\Param $val
		 */
		public function setParam ( \com\servandserv\happymeal\views\Param $val ) {
			$this->_Param[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\Param[]
		 */
		public function setParamArray ( array $vals ) {
			$this->_Param = $vals;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getMethod() {
			return $this->_Method;
		}
		/**
		 * @return \StringType
		 */
		public function getUrl() {
			return $this->_Url;
		}
		/**
		 * @return com\servandserv\happymeal\views\Param | []
		 */
		public function getParam($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Param[$index]) ? $this->_Param[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Param, $cb));
			} else {
				$res = $this->_Param;
			}
			return $res;
		}
	}
		

