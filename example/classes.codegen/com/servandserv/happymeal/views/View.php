<?php
	namespace com\servandserv\happymeal\views;
		
	class View extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "View";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_SessionId = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 Container for environment parameters
		 * @var com\servandserv\happymeal\views\Env
		 */
		protected $_Env = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\happymeal\views\TokenType
		 */
		protected $_Token = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var com\servandserv\happymeal\views\TokenType
		 */
		protected $_Referrer = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 0 
		 * @var com\servandserv\happymeal\views\TokenType
		 */
		protected $_Callback = null;
		public function __construct() {
			parent::__construct();
			$this->__props["9778d5d219c5080b9a6a17bef029331c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"sessionId",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\View',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_SessionId",
				"getter"=>"getSessionId",
				"setter"=>"setSessionId",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["fe9fc289c3ff0af142b6d3bead98a923"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Env",
			    "class"=>'com\servandserv\happymeal\views\Env',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Env",
				"getter"=>"getEnv",
				"setter"=>"setEnv",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["68d30a9594728bc39aa24be94b319d21"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Token",
			    "class"=>'com\servandserv\happymeal\views\View\Token',
			    "classNS"=>'com\servandserv\happymeal\views\View',
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
			$this->__props["3ef815416f775098fe977004015c6193"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Referrer",
			    "class"=>'com\servandserv\happymeal\views\View\Referrer',
			    "classNS"=>'com\servandserv\happymeal\views\View',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Referrer",
				"getter"=>"getReferrer",
				"setter"=>"setReferrer",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>0
			);
			$this->__props["93db85ed909c13838ff95ccfa94cebd9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Callback",
			    "class"=>'com\servandserv\happymeal\views\View\Callback',
			    "classNS"=>'com\servandserv\happymeal\views\View',
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
		public function setSessionId (  $val ) {
			$this->_SessionId = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\Env $val
		 */
		public function setEnv ( \com\servandserv\happymeal\views\Env $val ) {
			$this->_Env = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\TokenType $val
		 */
		public function setToken ( \com\servandserv\happymeal\views\TokenType $val ) {
			$this->_Token = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\TokenType $val
		 */
		public function setReferrer ( \com\servandserv\happymeal\views\TokenType $val = NULL ) {
			$this->_Referrer = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\TokenType $val
		 */
		public function setCallback ( \com\servandserv\happymeal\views\TokenType $val = NULL ) {
			$this->_Callback = $val;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getSessionId() {
			return $this->_SessionId;
		}
		/**
		 * @return com\servandserv\happymeal\views\Env
		 */
		public function getEnv() {
			return $this->_Env;
		}
		/**
		 * @return com\servandserv\happymeal\views\TokenType
		 */
		public function getToken() {
			return $this->_Token;
		}
		/**
		 * @return com\servandserv\happymeal\views\TokenType
		 */
		public function getReferrer() {
			return $this->_Referrer;
		}
		/**
		 * @return com\servandserv\happymeal\views\TokenType
		 */
		public function getCallback() {
			return $this->_Callback;
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\views\ViewValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

