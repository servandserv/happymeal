<?php
	namespace com\servandserv\happymeal\views;
		
	class Session extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Session";
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
		 * @var com\servandserv\happymeal\views\State
		 */
		protected $_State = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\happymeal\views\Session\Token
		 */
		protected $_Token = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var com\servandserv\happymeal\views\Session\Referer
		 */
		protected $_Referer = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var com\servandserv\happymeal\views\Session\Callback
		 */
		protected $_Callback = null;
		public function __construct() {
			parent::__construct();
			$this->__props["19ca14e7ea6328a42e0eb13d585e4c22"] = array(
			    "attribute"=>false,
			    "nodeName"=>"id",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
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
			$this->__props["a5bfc9e07964f8dddeb95fc584cd965d"] = array(
			    "attribute"=>false,
			    "nodeName"=>"State",
			    "class"=>'com\servandserv\happymeal\views\State',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_State",
				"getter"=>"getState",
				"setter"=>"setState",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["a5771bce93e200c36f7cd9dfd0e5deaa"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Token",
			    "class"=>'com\servandserv\happymeal\views\Session\Token',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Token",
				"getter"=>"getToken",
				"setter"=>"setToken",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["d67d8ab4f4c10bf22aa353e27879133c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Referer",
			    "class"=>'com\servandserv\happymeal\views\Session\Referer',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Referer",
				"getter"=>"getReferer",
				"setter"=>"setReferer",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["d645920e395fedad7bbbed0eca3fe2e0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Callback",
			    "class"=>'com\servandserv\happymeal\views\Session\Callback',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Callback",
				"getter"=>"getCallback",
				"setter"=>"setCallback",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
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
		 * @param com\servandserv\happymeal\views\State $val
		 */
		public function setState ( \com\servandserv\happymeal\views\State $val ) {
			$this->_State = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\Session\Token $val
		 */
		public function setToken ( \com\servandserv\happymeal\views\Session\Token $val ) {
			$this->_Token = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\Session\Referer $val
		 */
		public function setReferer ( \com\servandserv\happymeal\views\Session\Referer $val ) {
			$this->_Referer = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\Session\Callback $val
		 */
		public function setCallback ( \com\servandserv\happymeal\views\Session\Callback $val ) {
			$this->_Callback = $val;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getId() {
			return $this->_Id;
		}
		/**
		 * @return com\servandserv\happymeal\views\State
		 */
		public function getState() {
			return $this->_State;
		}
		/**
		 * @return com\servandserv\happymeal\views\Session\Token
		 */
		public function getToken() {
			return $this->_Token;
		}
		/**
		 * @return com\servandserv\happymeal\views\Session\Referer
		 */
		public function getReferer() {
			return $this->_Referer;
		}
		/**
		 * @return com\servandserv\happymeal\views\Session\Callback
		 */
		public function getCallback() {
			return $this->_Callback;
		}
	}
		

