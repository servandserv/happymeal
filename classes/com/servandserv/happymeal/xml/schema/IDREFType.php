<?php

namespace com\servandserv\happymeal\xml\schema;

class IDREFType extends NCNameType
{
	const ROOT = "IDREF";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	const VALIDATOR_CLASS = "com\servandserv\happymeal\xml\schema\IDREFTypeValidator";
	
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = AnyType::ELEMENT ) 
	{
	    parent::toXmlWriter( $xw, $xmlname, $xmlns, $mode );
	}
}