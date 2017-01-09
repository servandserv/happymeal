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
			    
			$this->__props["a684eceee76fc522773286a895bc8436"] = array(
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
			    
			$this->__props["72b32a1f754ba1c09b3695e0cb6cde7f"] = array(
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
			    
			$this->__props["072b030ba126b2f4b2374f342be9ed44"] = array(
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
			    
			$this->__props["03afdbd66e7929b125f8597834fa83a4"] = array(
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
			    
			$this->__props["3295c76acbf4caaed33c36b1b5fc2cb1"] = array(
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
			    
			$this->__props["14bfa6bb14875e45bba028a21ed38046"] = array(
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
			    
			$this->__props["32bb90e8976aab5298d5da10fe66f21d"] = array(
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
	

