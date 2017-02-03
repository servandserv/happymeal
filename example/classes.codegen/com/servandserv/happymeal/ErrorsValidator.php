<?php

	namespace com\servandserv\happymeal;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\Errors
	 *
	 */
	class ErrorsValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\Errors $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["35f4a8d465e6e1edc05f3d8ab658c551"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Error",
			    "class"=>'com\servandserv\happymeal\errors\Error',
			    "classNS"=>'com\servandserv\happymeal\errors',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\errors\ErrorValidator',
				"prop"=>"_Error",
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
			$this->nodeName = "Errors";
			$this->targetNS = "urn:com:servandserv:happymeal:errors";
			$this->classNS = "com:servandserv:happymeal";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getError','Error','0' );
			$this->assertMaxOccurs( 'getError','Error','unbounded' );
		}
	}
	
