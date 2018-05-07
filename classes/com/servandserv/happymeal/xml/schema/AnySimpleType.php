<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;
use \com\servandserv\happymeal\Bindings;

class AnySimpleType extends AnyType 
{
	
	const ROOT = "anySimpleType";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	const VALIDATOR_CLASS = "com\servandserv\happymeal\xml\schema\AnySimpleTypeValidator";
	
	public function __construct( $val = NULL ) 
	{
		$this->__text( $val );
		return $this;
	}
	
	public function validateType ( ErrorsHandler $handler ) 
	{
	    Bindings::create( static::VALIDATOR_CLASS, array( $this, $handler ) )->validate();
	}
	
	public function equals( AnyType $obj ) 
	{
		return $this->__text() === $obj->__text();
	}
	
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = AnyType::ELEMENT ) 
	{
	    parent::toXmlWriter( $xw, $xmlname, $xmlns, $mode );
	}
	
	public function fromXmlReader ( \XMLReader &$xr ) 
	{
		while( $xr->nodeType != \XMLReader::ELEMENT ) $xr->read();
		$root = $xr->localName;
		if( $xr->isEmptyElement ) return $this;
		while( $xr->read() ) {
			if( $xr->nodeType == \XMLReader::TEXT ) {
				$this->__text( $xr->value );
			} elseif( $xr->nodeType == \XMLReader::END_ELEMENT && $root == $xr->localName ) {
				return $this;
			}
		}
		return $this;
	}
}