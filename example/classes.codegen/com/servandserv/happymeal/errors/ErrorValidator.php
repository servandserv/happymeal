<?php

	namespace com\servandserv\happymeal\errors;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\errors\Error
	 *
	 */
	class ErrorValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\errors\Error $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["c4ca4238a0b923820dcc509a6f75849b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"targetNS",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\happymeal\errors\Error\TargetNSValidator",
				"prop"=>"TargetNS",
				"getter"=>"getTargetNS",
				"setter"=>"setTargetNS",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["c81e728d9d4c2f636f067f89cc14862c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"name",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\happymeal\errors\Error\NameValidator",
				"prop"=>"Name",
				"getter"=>"getName",
				"setter"=>"setName",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["eccbc87e4b5ce2fe28308fd9f2a7baf3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\happymeal\errors\Error\ValueValidator",
				"prop"=>"Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["a87ff679a2f3e71d9181a67b7542122c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rule",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\happymeal\errors\Error\RuleValidator",
				"prop"=>"Rule",
				"getter"=>"getRule",
				"setter"=>"setRule",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["e4da3b7fbbce2345d7772b0674a318d5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"assertion",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\happymeal\errors\Error\AssertionValidator",
				"prop"=>"Assertion",
				"getter"=>"getAssertion",
				"setter"=>"setAssertion",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1679091c5a880faf6fb5e6087eb1b2dc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"description",
			    "class"=>"",
			    "classNS"=>"com\servandserv\happymeal\errors\Error",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\happymeal\errors\Error\DescriptionValidator",
				"prop"=>"Description",
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
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'TargetNS','1' );
			$this->assertMaxOccurs( 'TargetNS','1' );
			$this->assertMinOccurs( 'Name','0' );
			$this->assertMaxOccurs( 'Name','1' );
			$this->assertMinOccurs( 'Value','0' );
			$this->assertMaxOccurs( 'Value','1' );
			$this->assertMinOccurs( 'Rule','1' );
			$this->assertMaxOccurs( 'Rule','1' );
			$this->assertMinOccurs( 'Assertion','0' );
			$this->assertMaxOccurs( 'Assertion','1' );
			$this->assertMinOccurs( 'Description','0' );
			$this->assertMaxOccurs( 'Description','1' );
		}
	}
	

