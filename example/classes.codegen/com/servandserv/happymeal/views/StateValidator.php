<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\State
	 *
	 */
	class StateValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\State $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["3416a75f4cea9109507cacd8e2f2aefc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"base",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\State',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\State\BaseValidator',
				"prop"=>"_Base",
				"getter"=>"getBase",
				"setter"=>"setBase",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["a1d0c6e83f027327d8461063f4ac58a6"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Param",
			    "class"=>'com\servandserv\happymeal\views\Param',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\ParamValidator',
				"prop"=>"_Param",
				"getter"=>"getParam",
				"setter"=>"setParam",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "State";
			$this->nodeName = "State";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getBase','base','1' );
			$this->assertMaxOccurs( 'getBase','base','1' );
			$this->assertMinOccurs( 'getParam','Param','0' );
			$this->assertMaxOccurs( 'getParam','Param','unbounded' );
		}
	}
	

