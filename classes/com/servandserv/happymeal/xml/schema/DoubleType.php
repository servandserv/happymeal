<?php

namespace com\servandserv\happymeal\xml\schema;

class DoubleType extends AnySimpleType 
{
	const ROOT = "double";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	const VALIDATOR_CLASS = "com\servandserv\happymeal\xml\schema\DoubleTypeValidator";
	
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = AnyType::ELEMENT ) 
	{
	    parent::toXmlWriter( $xw, $xmlname, $xmlns, $mode );
	}
}
