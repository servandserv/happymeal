<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\Tokens
	 *
	 */
	class TokensValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\Tokens $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["26657d5ff9020d2abefe558796b99584"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Token",
			    "class"=>'com\servandserv\happymeal\views\Tokens\Token',
			    "classNS"=>'com\servandserv\happymeal\views\Tokens',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\Tokens\TokenValidator',
				"prop"=>"_Token",
				"getter"=>"getToken",
				"setter"=>"setToken",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"true",
				"minOccurs"=>"0",
				"maxOccurs"=>"unbounded"
			);
			$this->className = "Tokens";
			$this->nodeName = "Tokens";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getToken','Token','0' );
			$this->assertMaxOccurs( 'getToken','Token','unbounded' );
		}
	}
	

