<?php
	namespace com\servandserv\happymeal\views;
		
	class View extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "View";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\happymeal\views\Session
		 */
		protected $_Session = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var com\servandserv\happymeal\views\Request
		 */
		protected $_Request = null;
		public function __construct() {
			parent::__construct();
			$this->__props["c16a5320fa475530d9583c34fd356ef5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Session",
			    "class"=>'com\servandserv\happymeal\views\Session',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Session",
				"getter"=>"getSession",
				"setter"=>"setSession",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["6364d3f0f495b6ab9dcf8d3b5c6e0b01"] = array(
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
		}
		/**
		 * @param com\servandserv\happymeal\views\Session $val
		 */
		public function setSession ( \com\servandserv\happymeal\views\Session $val ) {
			$this->_Session = $val;
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
		 * @return com\servandserv\happymeal\views\Session
		 */
		public function getSession() {
			return $this->_Session;
		}
		/**
		 * @return com\servandserv\happymeal\views\Request
		 */
		public function getRequest() {
			return $this->_Request;
		}
	}
		

