<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\TokenType
	 *
	 */
	class TokenTypeValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\TokenType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["38b3eff8baf56627478ec76a704e9b52"] = array(
			    "attribute"=>false,
			    "nodeName"=>"id",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\TokenType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\TokenType\IdValidator',
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
			    
			$this->__props["ec8956637a99787bd197eacd77acce5e"] = array(
			    "attribute"=>false,
			    "nodeName"=>"created",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\TokenType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\IntegerType',
			    "validator"=>'com\servandserv\happymeal\views\TokenType\CreatedValidator',
				"prop"=>"_Created",
				"getter"=>"getCreated",
				"setter"=>"setCreated",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["6974ce5ac660610b44d9b9fed0ff9548"] = array(
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
			    
			$this->__props["c9e1074f5b3f9fc8ea15d152add07294"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Errors",
			    "class"=>'com\servandserv\happymeal\Errors',
			    "classNS"=>'com\servandserv\happymeal',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\ErrorsValidator',
				"prop"=>"_Errors",
				"getter"=>"getErrors",
				"setter"=>"setErrors",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "TokenType";
			$this->nodeName = "TokenType";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getId','id','1' );
			$this->assertMaxOccurs( 'getId','id','1' );
			$this->assertMinOccurs( 'getCreated','created','1' );
			$this->assertMaxOccurs( 'getCreated','created','1' );
			$this->assertMinOccurs( 'getRequest','Request','1' );
			$this->assertMaxOccurs( 'getRequest','Request','1' );
			$this->assertMinOccurs( 'getErrors','Errors','0' );
			$this->assertMaxOccurs( 'getErrors','Errors','unbounded' );
		}
	}
	

