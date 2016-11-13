<?php
	namespace ru\bystrobank\data\currency_bankiru;
		
	class Office extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:bystrobank:data:currency_bankiru";
		const ROOT = "office";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var ru\bystrobank\data\currency_bankiru\Currencies
		 */
		protected $_Currencies = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Int
		 */
		protected $_Code = null;
		public function __construct() {
			parent::__construct();
			$this->__props["642e92efb79421734881b53e1e1b18b6"] = array(
			    "attribute"=>false,
			    "nodeName"=>"currencies",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Currencies',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Currencies",
				"getter"=>"getCurrencies",
				"setter"=>"setCurrencies",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["f457c545a9ded88f18ecee47145a72c0"] = array(
			    "attribute"=>true,
			    "nodeName"=>"code",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Office',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Int',
				"prop"=>"_Code",
				"getter"=>"getCode",
				"setter"=>"setCode",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Currencies $val
		 */
		public function setCurrencies ( \ru\bystrobank\data\currency_bankiru\Currencies $val ) {
			$this->_Currencies = $val;
			return $this;
		}
		/**
		 * @param \Int $val
		 */
		public function setCode (  $val ) {
			$this->_Code = $val;
			return $this;
		}
		/**
		 * @return ru\bystrobank\data\currency_bankiru\Currencies
		 */
		public function getCurrencies() {
			return $this->_Currencies;
		}
		/**
		 * @return \Int
		 */
		public function getCode() {
			return $this->_Code;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('ru\bystrobank\data\currency_bankiru\OfficeValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

