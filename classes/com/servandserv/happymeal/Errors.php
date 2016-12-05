<?php
	namespace com\servandserv\happymeal;
		
	class Errors extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:errors";
		const ROOT = "Errors";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\happymeal\errors\Error
		 */
		protected $_Error = [];
		public function __construct() {
			parent::__construct();
			$this->__props["45c48cce2e2d7fbdea1afc51c7c6ad26"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Error",
			    "class"=>'com\servandserv\happymeal\errors\Error',
			    "classNS"=>'com\servandserv\happymeal\errors',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Error",
				"getter"=>"getError",
				"setter"=>"setError",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"true",
				"minOccurs"=>0
			);
		}
		/**
		 * @param com\servandserv\happymeal\errors\Error $val
		 */
		public function setError ( \com\servandserv\happymeal\errors\Error $val ) {
			$this->_Error[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\errors\Error[]
		 */
		public function setErrorArray ( array $vals ) {
			$this->_Error = $vals;
			return $this;
		}
		/**
		 * @return com\servandserv\happymeal\errors\Error | []
		 */
		public function getError($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Error[$index]) ? $this->_Error[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Error, $cb));
			} else {
				$res = $this->_Error;
			}
			return $res;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\ErrorsValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

