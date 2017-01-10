<?php
	namespace com\servandserv\happymeal\views;
		
	/**
	 * State use for permanent user session data
	 * 
	 */
	class State extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "State";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Base = null;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\happymeal\views\Param
		 */
		protected $_Param = [];
		public function __construct() {
			parent::__construct();
			$this->__props["3416a75f4cea9109507cacd8e2f2aefc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"base",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\State',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Base",
				"getter"=>"getBase",
				"setter"=>"setBase",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["a1d0c6e83f027327d8461063f4ac58a6"] = array(
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
		public function setBase (  $val ) {
			$this->_Base = $val;
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
		public function getBase() {
			return $this->_Base;
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
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\views\StateValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

