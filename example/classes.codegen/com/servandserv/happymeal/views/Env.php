<?php
	namespace com\servandserv\happymeal\views;
		
	/**
	 * Container for environment parameters
	 * 
	 */
	class Env extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Env";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\happymeal\views\Param
		 */
		protected $_Param = [];
		public function __construct() {
			parent::__construct();
			$this->__props["92cc227532d17e56e07902b254dfad10"] = array(
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
		 * @param com\servandserv\happymeal\views\Param $val
		 */
		public function setParam ( \com\servandserv\happymeal\views\Param $val ) {
			$this->_Param[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\Param[]
		 */
		public function setParamArray ( array $vals = []  ) {
			$this->_Param = $vals;
			return $this;
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
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\views\EnvValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

