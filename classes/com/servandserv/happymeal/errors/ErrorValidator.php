<?php

	namespace com\servandserv\happymeal\errors;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\errors\Error
	 *
	 */
	class ErrorValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\errors\Error $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["eccbc87e4b5ce2fe28308fd9f2a7baf3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"targetNS",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\errors\Error\TargetNSValidator',
				"prop"=>"_TargetNS",
				"getter"=>"getTargetNS",
				"setter"=>"setTargetNS",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1679091c5a880faf6fb5e6087eb1b2dc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"classNS",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\errors\Error\ClassNSValidator',
				"prop"=>"_ClassNS",
				"getter"=>"getClassNS",
				"setter"=>"setClassNS",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["45c48cce2e2d7fbdea1afc51c7c6ad26"] = array(
			    "attribute"=>false,
			    "nodeName"=>"name",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\errors\Error\NameValidator',
				"prop"=>"_Name",
				"getter"=>"getName",
				"setter"=>"setName",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["c20ad4d76fe97759aa27a0c99bff6710"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\errors\Error\ValueValidator',
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["9bf31c7ff062936a96d3c8bd1f8f2ff3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rule",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\errors\Error\RuleValidator',
				"prop"=>"_Rule",
				"getter"=>"getRule",
				"setter"=>"setRule",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["6f4922f45568161a8cdf4ad2299f6d23"] = array(
			    "attribute"=>false,
			    "nodeName"=>"assertion",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\errors\Error\AssertionValidator',
				"prop"=>"_Assertion",
				"getter"=>"getAssertion",
				"setter"=>"setAssertion",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["3c59dc048e8850243be8079a5c74d079"] = array(
			    "attribute"=>false,
			    "nodeName"=>"description",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\errors\Error',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\errors\Error\DescriptionValidator',
				"prop"=>"_Description",
				"getter"=>"getDescription",
				"setter"=>"setDescription",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			$this->className = "Error";
			$this->nodeName = "Error";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
			$this->classNS = "com:servandserv:happymeal:errors";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getTargetNS','targetNS','1' );
			$this->assertMaxOccurs( 'getTargetNS','targetNS','1' );
			$this->assertMinOccurs( 'getClassNS','classNS','1' );
			$this->assertMaxOccurs( 'getClassNS','classNS','1' );
			$this->assertMinOccurs( 'getName','name','0' );
			$this->assertMaxOccurs( 'getName','name','1' );
			$this->assertMinOccurs( 'getValue','value','0' );
			$this->assertMaxOccurs( 'getValue','value','1' );
			$this->assertMinOccurs( 'getRule','rule','1' );
			$this->assertMaxOccurs( 'getRule','rule','1' );
			$this->assertMinOccurs( 'getAssertion','assertion','0' );
			$this->assertMaxOccurs( 'getAssertion','assertion','1' );
			$this->assertMinOccurs( 'getDescription','description','0' );
			$this->assertMaxOccurs( 'getDescription','description','1' );
		}
	}
	

