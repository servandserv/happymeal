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
			    
			$this->__props["093f65e080a295f8076b1c5722a46aa2"] = array(
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
			    
			$this->__props["072b030ba126b2f4b2374f342be9ed44"] = array(
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
			    
			$this->__props["7f39f8317fbdb1988ef4c628eba02591"] = array(
			    "attribute"=>false,
			    "nodeName"=>"url",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\TokenType',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\TokenType\UrlValidator',
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
			    
			$this->__props["44f683a84163b3523afe57c2e008bc8c"] = array(
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
			$this->assertMinOccurs( 'getUrl','url','1' );
			$this->assertMaxOccurs( 'getUrl','url','1' );
			$this->assertMinOccurs( 'getErrors','Errors','0' );
			$this->assertMaxOccurs( 'getErrors','Errors','unbounded' );
		}
	}
	

