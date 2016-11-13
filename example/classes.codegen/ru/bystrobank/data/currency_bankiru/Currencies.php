<?php
	namespace ru\bystrobank\data\currency_bankiru;
		
	class Currencies extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:bystrobank:data:currency_bankiru";
		const ROOT = "currencies";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 1 
		 * @var Array of ru\bystrobank\data\currency_bankiru\Currency
		 */
		protected $_Currency = [];
		public function __construct() {
			parent::__construct();
			$this->__props["93db85ed909c13838ff95ccfa94cebd9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"currency",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Currency',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Currency",
				"getter"=>"getCurrency",
				"setter"=>"setCurrency",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"true",
				"minOccurs"=>1
			);
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Currency $val
		 */
		public function setCurrency ( \ru\bystrobank\data\currency_bankiru\Currency $val ) {
			$this->_Currency[] = $val;
			return $this;
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Currency[]
		 */
		public function setCurrencyArray ( array $vals ) {
			$this->_Currency = $vals;
			return $this;
		}
		/**
		 * @return ru\bystrobank\data\currency_bankiru\Currency | []
		 */
		public function getCurrency($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Currency[$index]) ? $this->_Currency[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Currency, $cb));
			} else {
				$res = $this->_Currency;
			}
			return $res;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('ru\bystrobank\data\currency_bankiru\CurrenciesValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

