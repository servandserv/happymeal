<?php
	namespace ru\bystrobank\data\currency_bankiru;
		
	class Exchange extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:bystrobank:data:currency_bankiru";
		const ROOT = "exchange";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Int
		 */
		protected $_Amount = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Double
		 */
		protected $_Buy = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \Double
		 */
		protected $_Sale = null;
		public function __construct() {
			parent::__construct();
			$this->__props["e2ef524fbf3d9fe611d5a8e90fefdc9c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"amount",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Int',
				"prop"=>"_Amount",
				"getter"=>"getAmount",
				"setter"=>"setAmount",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["ed3d2c21991e3bef5e069713af9fa6ca"] = array(
			    "attribute"=>false,
			    "nodeName"=>"buy",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Double',
				"prop"=>"_Buy",
				"getter"=>"getBuy",
				"setter"=>"setBuy",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["ac627ab1ccbdb62ec96e702f07f6425b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"sale",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Exchange',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\Double',
				"prop"=>"_Sale",
				"getter"=>"getSale",
				"setter"=>"setSale",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
		}
		/**
		 * @param \Int $val
		 */
		public function setAmount (  $val ) {
			$this->_Amount = $val;
			return $this;
		}
		/**
		 * @param \Double $val
		 */
		public function setBuy (  $val ) {
			$this->_Buy = $val;
			return $this;
		}
		/**
		 * @param \Double $val
		 */
		public function setSale (  $val ) {
			$this->_Sale = $val;
			return $this;
		}
		/**
		 * @return \Int
		 */
		public function getAmount() {
			return $this->_Amount;
		}
		/**
		 * @return \Double
		 */
		public function getBuy() {
			return $this->_Buy;
		}
		/**
		 * @return \Double
		 */
		public function getSale() {
			return $this->_Sale;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('ru\bystrobank\data\currency_bankiru\ExchangeValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

