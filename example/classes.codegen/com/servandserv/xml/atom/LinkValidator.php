<?php

	namespace com\servandserv\xml\atom;
	
	/**
	 *
	 * Валидатор класса com\servandserv\xml\atom\Link
	 *
	 */
	class LinkValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\xml\atom\Link $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["eccbc87e4b5ce2fe28308fd9f2a7baf3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rel",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\xml\atom\Link\RelValidator',
				"prop"=>"_Rel",
				"getter"=>"getRel",
				"setter"=>"setRel",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["a87ff679a2f3e71d9181a67b7542122c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"href",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\xml\atom\Link\HrefValidator',
				"prop"=>"_Href",
				"getter"=>"getHref",
				"setter"=>"setHref",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["e4da3b7fbbce2345d7772b0674a318d5"] = array(
			    "attribute"=>false,
			    "nodeName"=>"type",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\xml\atom\Link\TypeValidator',
				"prop"=>"_Type",
				"getter"=>"getType",
				"setter"=>"setType",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["1679091c5a880faf6fb5e6087eb1b2dc"] = array(
			    "attribute"=>false,
			    "nodeName"=>"method",
			    "class"=>'',
			    "classNS"=>'com\servandserv\xml\atom\Link',
			    "prototype"=>'com\servandserv\happymeal\XML\Schema\StringType',
			    "validator"=>'com\servandserv\xml\atom\Link\MethodValidator',
				"prop"=>"_Method",
				"getter"=>"getMethod",
				"setter"=>"setMethod",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:xml:atom",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			$this->className = "Link";
			$this->nodeName = "Link";
			$this->targetNS = "urn:com:servandserv:xml:atom";
			$this->classNS = "com:servandserv:xml:atom";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'getRel','rel','1' );
			$this->assertMaxOccurs( 'getRel','rel','1' );
			$this->assertMinOccurs( 'getHref','href','1' );
			$this->assertMaxOccurs( 'getHref','href','1' );
			$this->assertMinOccurs( 'getType','type','0' );
			$this->assertMaxOccurs( 'getType','type','1' );
			$this->assertMinOccurs( 'getMethod','method','0' );
			$this->assertMaxOccurs( 'getMethod','method','1' );
		}
	}
	

