<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\Request
	 *
	 */
	class RequestValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\Request $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["f457c545a9ded88f18ecee47145a72c0"] = array(
			    "attribute"=>false,
			    "nodeName"=>"method",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Request',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\Request\MethodValidator',
				"prop"=>"_Method",
				"getter"=>"getMethod",
				"setter"=>"setMethod",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["c0c7c76d30bd3dcaefc96f40275bdc0a"] = array(
			    "attribute"=>false,
			    "nodeName"=>"url",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Request',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\Request\UrlValidator',
				"prop"=>"_Url",
				"getter"=>"getUrl",
				"setter"=>"setUrl",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["2838023a778dfaecdc212708f721b788"] = array(
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
			$this->className = "Request";
			$this->nodeName = "Request";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getMethod','method','1' );
			$this->assertMaxOccurs( 'getMethod','method','1' );
			$this->assertMinOccurs( 'getUrl','url','1' );
			$this->assertMaxOccurs( 'getUrl','url','1' );
			$this->assertMinOccurs( 'getParam','Param','0' );
			$this->assertMaxOccurs( 'getParam','Param','unbounded' );
		}
	}
	

