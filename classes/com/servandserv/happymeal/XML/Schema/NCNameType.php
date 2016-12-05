<?php

namespace com\servandserv\happymeal\XML\Schema;

class NCNameType extends NameType 
{
	
	const ROOT = "NCName";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	
	public function validateType ( \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		$validator = \com\servandserv\happymeal\Bindings::create("com\servandserv\happymeal\XML\Schema\NCNameTypeValidator",array( $this, $handler ));
		$validator->validate();
	}
	
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \com\servandserv\happymeal\XMLAdaptor::ELEMENT ) 
	{
		if( $mode & \com\servandserv\happymeal\XMLAdaptor::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
		$xw->text( $this->__text() );
		if( $mode & \com\servandserv\happymeal\XMLAdaptor::ENDELEMENT ) $xw->endElement();
	}
	
}