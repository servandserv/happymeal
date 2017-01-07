<?php
	namespace com\servandserv\happymeal\views;
		
	class Param extends \com\servandserv\happymeal\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Param";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Name = null;
		/**
		 * @maxOccurs 1 
		 * @minOccurs 1 
		 * @var \StringType
		 */
		protected $_Value = null;
		public function __construct() {
			parent::__construct();
			$this->__props["b53b3a3d6ab90ce0268229151c9bde11"] = array(
			    "attribute"=>false,
			    "nodeName"=>"name",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Param',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Name",
				"getter"=>"getName",
				"setter"=>"setName",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
			$this->__props["9f61408e3afb633e50cdf1b20de6f466"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Param',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>1
			);
		}
		/**
		 * @param \StringType $val
		 */
		public function setName (  $val ) {
			$this->_Name = $val;
			return $this;
		}
		/**
		 * @param \StringType $val
		 */
		public function setValue (  $val ) {
			$this->_Value = $val;
			return $this;
		}
		/**
		 * @return \StringType
		 */
		public function getName() {
			return $this->_Name;
		}
		/**
		 * @return \StringType
		 */
		public function getValue() {
			return $this->_Value;
		}
	}
		

