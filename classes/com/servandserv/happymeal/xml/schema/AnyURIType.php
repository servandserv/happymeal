<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;
use \com\servandserv\happymeal\Bindings;
use \com\servandserv\happymeal\XMLAdaptor;

class AnyURIType extends AnySimpleType 
{
	
	const ROOT = "anyURI";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	
	public function validateType ( ErrorsHandler $handler ) 
	{
		$validator = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\happymeal\xml\schema\AnyURITypeValidator', array( $this, $handler ) );
		$validator->validate();
	}
	
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = XMLAdaptor::ELEMENT ) 
	{
		if( $mode & XMLAdaptor::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
		$xw->text( $this->__text() );
		if( $mode & XMLAdaptor::ENDELEMENT ) $xw->endElement();
	}
	
}
