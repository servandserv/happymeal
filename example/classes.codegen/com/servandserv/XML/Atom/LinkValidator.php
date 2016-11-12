<?php

	namespace com\servandserv\XML\Atom;
	
	/**
	 *
	 * Валидатор класса com\servandserv\XML\Atom\Link
	 *
	 */
	class LinkValidator extends \com\servandserv\happymeal\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \com\servandserv\XML\Atom\Link $tdo = NULL, \com\servandserv\happymeal\ValidationHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			    
			$this->__props["c4ca4238a0b923820dcc509a6f75849b"] = array(
			    "attribute"=>false,
			    "nodeName"=>"rel",
			    "class"=>"",
			    "classNS"=>"com\servandserv\XML\Atom\Link",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\XML\Atom\Link\RelValidator",
				"prop"=>"Rel",
				"getter"=>"getRel",
				"setter"=>"setRel",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["c81e728d9d4c2f636f067f89cc14862c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"href",
			    "class"=>"",
			    "classNS"=>"com\servandserv\XML\Atom\Link",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\XML\Atom\Link\HrefValidator",
				"prop"=>"Href",
				"getter"=>"getHref",
				"setter"=>"setHref",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>"1",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["eccbc87e4b5ce2fe28308fd9f2a7baf3"] = array(
			    "attribute"=>false,
			    "nodeName"=>"type",
			    "class"=>"",
			    "classNS"=>"com\servandserv\XML\Atom\Link",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\XML\Atom\Link\TypeValidator",
				"prop"=>"Type",
				"getter"=>"getType",
				"setter"=>"setType",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			    
			$this->__props["a87ff679a2f3e71d9181a67b7542122c"] = array(
			    "attribute"=>false,
			    "nodeName"=>"method",
			    "class"=>"",
			    "classNS"=>"com\servandserv\XML\Atom\Link",
			    "prototype"=>"com\servandserv\happymeal\XML\Schema\String",
			    "validator"=>"com\servandserv\XML\Atom\Link\MethodValidator",
				"prop"=>"Method",
				"getter"=>"getMethod",
				"setter"=>"setMethod",
				"default"=>"",
				"fixed"=>"",
				"xmlns"=>"urn:com:servandserv:XML:Atom:Link",
				"array"=>"",
				"minOccurs"=>"0",
				"maxOccurs"=>"1"
			);
			$this->className = "Link";
			$this->targetNS = "urn:com:servandserv:XML:Atom:Link";
		}
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Rel','1' );
			$this->assertMaxOccurs( 'Rel','1' );
			$this->assertMinOccurs( 'Href','1' );
			$this->assertMaxOccurs( 'Href','1' );
			$this->assertMinOccurs( 'Type','0' );
			$this->assertMaxOccurs( 'Type','1' );
			$this->assertMinOccurs( 'Method','0' );
			$this->assertMaxOccurs( 'Method','1' );
		}
	}
	

