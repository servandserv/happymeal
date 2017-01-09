<?php
	namespace com\servandserv\happymeal\views;
		
	class Tokens extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Tokens";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of com\servandserv\happymeal\views\TokenType
		 */
		protected $_Token = [];
		public function __construct() {
			parent::__construct();
			$this->__props["26657d5ff9020d2abefe558796b99584"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Token",
			    "class"=>'com\servandserv\happymeal\views\Tokens\Token',
			    "classNS"=>'com\servandserv\happymeal\views\Tokens',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Token",
				"getter"=>"getToken",
				"setter"=>"setToken",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"true",
				"minOccurs"=>0
			);
		}
		/**
		 * @param com\servandserv\happymeal\views\TokenType $val
		 */
		public function setToken ( \com\servandserv\happymeal\views\TokenType $val ) {
			$this->_Token[] = $val;
			return $this;
		}
		/**
		 * @param com\servandserv\happymeal\views\TokenType[]
		 */
		public function setTokenArray ( array $vals = []  ) {
			$this->_Token = $vals;
			return $this;
		}
		/**
		 * @return com\servandserv\happymeal\views\TokenType | []
		 */
		public function getToken($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Token[$index]) ? $this->_Token[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Token, $cb));
			} else {
				$res = $this->_Token;
			}
			return $res;
		}
		
		public function validateType( \com\servandserv\happymeal\ErrorsHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('com\servandserv\happymeal\views\TokensValidator',array($this,$handler));
			$validator->validate();
			
			return $handler->hasErrors() ? $handler->getErrors() : FALSE;
		}
			
	}
		

