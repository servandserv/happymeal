<?php
	namespace ru\bystrobank\data\currency_bankiru;
		
	class Currency extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:bystrobank:data:currency_bankiru";
		const ROOT = "currency";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var ru\bystrobank\data\currency_bankiru\Exchanges
		 */
		protected $_Exchanges = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Int
		 */
		protected $_Id = null;
		public function __construct() {
			parent::__construct();
			$this->__props["2a38a4a9316c49e5a833517c45d31070"] = array(
			    "attribute"=>false,
			    "nodeName"=>"exchanges",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Exchanges',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Exchanges",
				"getter"=>"getExchanges",
				"setter"=>"setExchanges",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["7647966b7343c29048673252e490f736"] = array(
			    "attribute"=>true,
			    "nodeName"=>"id",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Currency',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Int',
				"prop"=>"_Id",
				"getter"=>"getId",
				"setter"=>"setId",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Exchanges $val
		 */
		public function setExchanges ( \ru\bystrobank\data\currency_bankiru\Exchanges $val ) {
			$this->_Exchanges = $val;
			return $this;
		}
		/**
		 * @param \Int $val
		 */
		public function setId (  $val ) {
			$this->_Id = $val;
			return $this;
		}
		/**
		 * @return ru\bystrobank\data\currency_bankiru\Exchanges
		 */
		public function getExchanges() {
			return $this->_Exchanges;
		}
		/**
		 * @return \Int
		 */
		public function getId() {
			return $this->_Id;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('ru\bystrobank\data\currency_bankiru\CurrencyValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

