<?php
	namespace ru\bystrobank\data\currency_bankiru;
		
	class Exchanges extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:bystrobank:data:currency_bankiru";
		const ROOT = "exchanges";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of ru\bystrobank\data\currency_bankiru\Exchange
		 */
		protected $_Exchange = [];
		public function __construct() {
			parent::__construct();
			$this->__props["812b4ba287f5ee0bc9d43bbf5bbe87fb"] = array(
			    "attribute"=>false,
			    "nodeName"=>"exchange",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Exchange",
				"getter"=>"getExchange",
				"setter"=>"setExchange",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"true",
				"minOccurs"=>0
			);
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Exchange $val
		 */
		public function setExchange ( \ru\bystrobank\data\currency_bankiru\Exchange $val ) {
			$this->_Exchange[] = $val;
			return $this;
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Exchange[]
		 */
		public function setExchangeArray ( array $vals ) {
			$this->_Exchange = $vals;
			return $this;
		}
		/**
		 * @return ru\bystrobank\data\currency_bankiru\Exchange | []
		 */
		public function getExchange($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Exchange[$index]) ? $this->_Exchange[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Exchange, $cb));
			} else {
				$res = $this->_Exchange;
			}
			return $res;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('ru\bystrobank\data\currency_bankiru\ExchangesValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

