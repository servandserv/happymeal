<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\View
	 *
	 */
	class ViewValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\View $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["c16a5320fa475530d9583c34fd356ef5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Session",
			    "class"=>'com\servandserv\happymeal\views\Session',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\SessionValidator',
				"prop"=>"_Session",
				"getter"=>"getSession",
				"setter"=>"setSession",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["6364d3f0f495b6ab9dcf8d3b5c6e0b01"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Request",
			    "class"=>'com\servandserv\happymeal\views\Request',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\RequestValidator',
				"prop"=>"_Request",
				"getter"=>"getRequest",
				"setter"=>"setRequest",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "View";
			$this->nodeName = "View";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getSession','Session','1' );
			$this->assertMaxOccurs( 'getSession','Session','1' );
			$this->assertMinOccurs( 'getRequest','Request','1' );
			$this->assertMaxOccurs( 'getRequest','Request','1' );
		}
	}
	

