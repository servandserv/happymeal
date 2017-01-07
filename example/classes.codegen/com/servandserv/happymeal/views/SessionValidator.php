<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\Session
	 *
	 */
	class SessionValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\Session $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["19ca14e7ea6328a42e0eb13d585e4c22"] = array(
			    "attribute"=>false,
			    "nodeName"=>"id",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\Session\IdValidator',
				"prop"=>"_Id",
				"getter"=>"getId",
				"setter"=>"setId",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["a5bfc9e07964f8dddeb95fc584cd965d"] = array(
			    "attribute"=>false,
			    "nodeName"=>"State",
			    "class"=>'com\servandserv\happymeal\views\State',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\StateValidator',
				"prop"=>"_State",
				"getter"=>"getState",
				"setter"=>"setState",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["a5771bce93e200c36f7cd9dfd0e5deaa"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Token",
			    "class"=>'com\servandserv\happymeal\views\Session\Token',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\Session\TokenValidator',
				"prop"=>"_Token",
				"getter"=>"getToken",
				"setter"=>"setToken",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["d67d8ab4f4c10bf22aa353e27879133c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Referer",
			    "class"=>'com\servandserv\happymeal\views\Session\Referer',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\Session\RefererValidator',
				"prop"=>"_Referer",
				"getter"=>"getReferer",
				"setter"=>"setReferer",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["d645920e395fedad7bbbed0eca3fe2e0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Callback",
			    "class"=>'com\servandserv\happymeal\views\Session\Callback',
			    "classNS"=>'com\servandserv\happymeal\views\Session',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\Session\CallbackValidator',
				"prop"=>"_Callback",
				"getter"=>"getCallback",
				"setter"=>"setCallback",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			$this->className = "Session";
			$this->nodeName = "Session";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getId','id','1' );
			$this->assertMaxOccurs( 'getId','id','1' );
			$this->assertMinOccurs( 'getState','State','1' );
			$this->assertMaxOccurs( 'getState','State','1' );
			$this->assertMinOccurs( 'getToken','Token','1' );
			$this->assertMaxOccurs( 'getToken','Token','1' );
			$this->assertMinOccurs( 'getReferer','Referer','0' );
			$this->assertMaxOccurs( 'getReferer','Referer','1' );
			$this->assertMinOccurs( 'getCallback','Callback','0' );
			$this->assertMaxOccurs( 'getCallback','Callback','1' );
		}
	}
	

