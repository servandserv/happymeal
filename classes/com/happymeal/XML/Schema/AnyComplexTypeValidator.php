<?php

namespace com\happymeal\XML\Schema;

class AnyComplexTypeValidator extends AnyTypeValidator 
{
	
	protected $simpleTypes = array();
	
	public function __construct ( \com\happymeal\XML\Schema\AnyComplexType $tdo, \com\happymeal\ValidationHandler $handler ) {
		parent::__construct( $tdo, $handler );
	}

	public function validate () {
		$vars = $this->tdo->_properties();
		foreach( $vars as $v=>$obj ) {
		    $prop = strtoupper(substr($v,0,1)).substr($v,1);
			if( isset( $this->simpleTypes[$prop] ) ) {
				$simpleValidator = $this->simpleTypes[$prop];
				$simpleValidator->validate();
			}elseif( is_object( $obj ) && method_exists( $obj, "validateType" ) ) {
				$obj->validateType( $this->validationHandler );
			}
		}
	}
	
	protected function assertMinOccurs( $prop, $minOccurs = 1 ) {
		$method = "get".$prop;
		if( !method_exists( $this->tdo, $method ) ) return;
		$val = $this->tdo->{$method}();
		if ( $val === NULL && $minOccurs != 0 ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MIN_OCCURS)
			    ->setValue($val));
		}
		if ( is_array( $val ) && $minOccurs > count( $val ) ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MIN_OCCURS)
			    ->setValue($val));
		}
	}
	
	protected function assertMaxOccurs( $prop, $maxOccurs = 1 ) {
		$method = "get".$prop;
		if( !method_exists( $this->tdo, $method ) ) return;
		$val = $this->tdo->{$method}();
		if ( is_array( $val ) && $maxOccurs != "unbounded" && count( $val ) > $maxOccurs  ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_MAX_OCCURS)
			    ->setValue($val));
		}
	}
	
	protected function assertChoice( array $props ) {
		$choice = 0;
		foreach( $props as $prop ) {
			$method = "get".$prop;
			if( !method_exists( $this->tdo, $method ) ) return;
			$val = $this->tdo->{$method}();
			if( $this->tdo->{$method}() ) $choice++;
		}
		if ( $choice > 1  ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_CHOICE)
			    ->setValue($val));
		}
	}
	
	protected function assertFixed( $prop, $fixed ) {
		$method = "get".$prop;
		if( !method_exists( $this->tdo, $method ) ) return;
		$val = $this->tdo->{$method}();
		if ( $val !== $fixed ) {
			$this->handleError((new \com\happymeal\errors\Error())
			    ->setTargetNS($this->targetNS)
			    ->setName($this->className)
			    ->setRule(self::ASSERT_FIXED)
			    ->setValue($val));
		}
	}
	
	protected function addSimpleValidator( $prop, \com\happymeal\XML\Schema\AnyTypeValidator $validator ) {
		$this->simpleTypes[$prop] = $validator;
	}
	
}