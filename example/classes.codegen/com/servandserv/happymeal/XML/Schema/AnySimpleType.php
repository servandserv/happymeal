<?php

namespace com\servandserv\happymeal\XML\Schema;

class AnySimpleType extends AnyType 
{
	
	const ROOT = "anySimpleType";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	
	public function __construct( $val = NULL ) 
	{
		$this->_text( $val );
		return $this;
	}
	
	public function validateType ( \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
	    \com\servandserv\happymeal\Bindings::create(
		    'com\servandserv\happymeal\XML\Schema\AnySimpleTypeValidator',
		    array( $this, $handler )
		)->validate();
	}
	
	public function equals( \com\servandserv\happymeal\XML\Schema\AnyType $obj ) 
	{
		return $this->_text() === $obj->_text();
	}
	
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \com\servandserv\happymeal\XMLAdaptor::ELEMENT ) 
	{
		if( $mode & \com\servandserv\happymeal\XMLAdaptor::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
		if( $prop = $this->_text() ) $xw->text( $prop ) ;
		if( $mode & \com\servandserv\happymeal\XMLAdaptor::ENDELEMENT ) $xw->endElement();
	}
	
	public function fromXmlReader ( \XMLReader &$xr ) 
	{
		while( $xr->nodeType != \XMLReader::ELEMENT ) $xr->read();
		$root = $xr->localName;
		if( $xr->isEmptyElement ) return $this;
		while( $xr->read() ) {
			if( $xr->nodeType == \XMLReader::TEXT ) {
				$this->_text( $xr->value );
			} elseif( $xr->nodeType == \XMLReader::END_ELEMENT && $root == $xr->localName ) {
				return $this;
			}
		}
		return $this;
	}
}
