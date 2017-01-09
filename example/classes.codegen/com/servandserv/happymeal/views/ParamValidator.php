<?php

	namespace com\servandserv\happymeal\views;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\Param
	 *
	 */
	class ParamValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\happymeal\views\Param $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["5fd0b37cd7dbbb00f97ba6ce92bf5add"] = array(
			    "attribute"=>false,
			    "nodeName"=>"name",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Param',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\Param\NameValidator',
				"prop"=>"_Name",
				"getter"=>"getName",
				"setter"=>"setName",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["2b44928ae11fb9384c4cf38708677c48"] = array(
			    "attribute"=>false,
			    "nodeName"=>"value",
			    "class"=>'',
			    "classNS"=>'com\servandserv\happymeal\views\Param',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\happymeal\views\Param\ValueValidator',
				"prop"=>"_Value",
				"getter"=>"getValue",
				"setter"=>"setValue",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:happymeal:views",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			$this->className = "Param";
			$this->nodeName = "Param";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getName','name','1' );
			$this->assertMaxOccurs( 'getName','name','1' );
			$this->assertMinOccurs( 'getValue','value','1' );
			$this->assertMaxOccurs( 'getValue','value','1' );
		}
	}
	

