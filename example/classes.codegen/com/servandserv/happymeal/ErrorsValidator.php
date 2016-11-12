<?php

	namespace com\servandserv\happymeal;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\Errors
	 *
	 */
	class ErrorsValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\Errors $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["c9f0f895fb98ab9159f51fd0297e236d"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Error",
			    "class"=>"com\servandserv\happymeal\errors\Error",
			    "classNS"=>"com\servandserv\happymeal\errors",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\AnyComplexType",
			    "validator"=>"com\servandserv\happymeal\errors\ErrorValidator",
				"prop"=>"Error",
				"getter"=>"getError",
				"setter"=>"setError",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:errors",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "Errors";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Error','0' );
			$this->assertMaxOccurs( 'Error','unbounded' );
		}
	}
