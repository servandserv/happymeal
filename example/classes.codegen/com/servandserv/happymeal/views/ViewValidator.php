<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\View
	 *
	 */
	class ViewValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\View $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["9778d5d219c5080b9a6a17bef029331c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"sessionId",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\View',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\View\SessionIdValidator',
				"prop"=>"_SessionId",
				"getter"=>"getSessionId",
				"setter"=>"setSessionId",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["fe9fc289c3ff0af142b6d3bead98a923"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Env",
			    "class"=>'com\servandserv\happymeal\views\Env',
			    "classNS"=>'com\servandserv\happymeal\views',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\EnvValidator',
				"prop"=>"_Env",
				"getter"=>"getEnv",
				"setter"=>"setEnv",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["68d30a9594728bc39aa24be94b319d21"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Token",
			    "class"=>'com\servandserv\happymeal\views\View\Token',
			    "classNS"=>'com\servandserv\happymeal\views\View',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\View\TokenValidator',
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
			    
			$this->__props["3ef815416f775098fe977004015c6193"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Referrer",
			    "class"=>'com\servandserv\happymeal\views\View\Referrer',
			    "classNS"=>'com\servandserv\happymeal\views\View',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\View\ReferrerValidator',
				"prop"=>"_Referrer",
				"getter"=>"getReferrer",
				"setter"=>"setReferrer",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["93db85ed909c13838ff95ccfa94cebd9"] = array(
			    "attribute"=>false,
			    "nodeName"=>"Callback",
			    "class"=>'com\servandserv\happymeal\views\View\Callback',
			    "classNS"=>'com\servandserv\happymeal\views\View',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\AnyComplexType',
			    "validator"=>'com\servandserv\happymeal\views\View\CallbackValidator',
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
			$this->className = "View";
			$this->nodeName = "View";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getSessionId','sessionId','1' );
			$this->assertMaxOccurs( 'getSessionId','sessionId','1' );
			$this->assertMinOccurs( 'getEnv','Env','1' );
			$this->assertMaxOccurs( 'getEnv','Env','1' );
			$this->assertMinOccurs( 'getToken','Token','1' );
			$this->assertMaxOccurs( 'getToken','Token','1' );
			$this->assertMinOccurs( 'getReferrer','Referrer','0' );
			$this->assertMaxOccurs( 'getReferrer','Referrer','1' );
			$this->assertMinOccurs( 'getCallback','Callback','0' );
			$this->assertMaxOccurs( 'getCallback','Callback','1' );
		}
	}
	

