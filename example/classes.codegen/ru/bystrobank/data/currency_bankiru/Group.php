<?php
	namespace ru\bystrobank\data\currency_bankiru;
		
	class Group extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:bystrobank:data:currency_bankiru";
		const ROOT = "group";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @minOccurs 0 
		 * @var Array of ru\bystrobank\data\currency_bankiru\Office
		 */
		protected $_Office = [];
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \String
		 */
		protected $_Version = null;
		public function __construct() {
			parent::__construct();
			$this->__props["6c8349cc7260ae62e3b1396831a8398f"] = array(
			    "attribute"=>false,
			    "nodeName"=>"office",
			    "class"=>'ru\bystrobank\data\currency_bankiru\Office',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
				"prop"=>"_Office",
				"getter"=>"getOffice",
				"setter"=>"setOffice",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"true",
				"minOccurs"=>0
			);
			$this->__props["d9d4f495e875a2e075a1a4a6e1b9770f"] = array(
			    "attribute"=>true,
			    "nodeName"=>"version",
			    "class"=>'',
			    "classNS"=>'ru\bystrobank\data\currency_bankiru\Group',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\String',
				"prop"=>"_Version",
				"getter"=>"getVersion",
				"setter"=>"setVersion",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:ru:bystrobank:data:currency_bankiru",
				"array"=>"",
				"minOccurs"=>1
			);
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Office $val
		 */
		public function setOffice ( \ru\bystrobank\data\currency_bankiru\Office $val ) {
			$this->_Office[] = $val;
			return $this;
		}
		/**
		 * @param ru\bystrobank\data\currency_bankiru\Office[]
		 */
		public function setOfficeArray ( array $vals ) {
			$this->_Office = $vals;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setVersion (  $val ) {
			$this->_Version = $val;
			return $this;
		}
		/**
		 * @return ru\bystrobank\data\currency_bankiru\Office | []
		 */
		public function getOffice($index = NULL, callable $cb = NULL) {
			if( $index !== NULL ) {
				$res = isset($this->_Office[$index]) ? $this->_Office[$index] : NULL;
			} elseif( $cb ) {
			    return array_values(array_filter($this->_Office, $cb));
			} else {
				$res = $this->_Office;
			}
			return $res;
		}
		/**
		 * @return \String
		 */
		public function getVersion() {
			return $this->_Version;
		}
		
		public function validateType( \com\servandserv\happymeal\ValidationHandler $handler ) {
			$validator = \com\servandserv\happymeal\Bindings::create('ru\bystrobank\data\currency_bankiru\GroupValidator',array($this,$handler));
			$validator->validate();
		}
			
	}
		

