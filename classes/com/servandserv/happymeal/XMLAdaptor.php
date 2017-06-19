<?php

namespace com\servandserv\happymeal;

interface XMLAdaptor 
{

	const CONTENTS=0;
	const STARTELEMENT=1;
	const ENDELEMENT=2;
	const ELEMENT=3;
	
	/**
	* Translate Object to XML string
	* @param XMLWriter $xw
	* @param string $xmlname document element name
	* @param string $xmlns element namespace
	* @param string $stylesheet link to XSLT template
	* @return string
	*/
	public function toXmlStr($xmlns=NULL,$xmlname=NULL,$pi=NULL);
	
	/**
	* Translate Object to XMLWriter
	* @param XMLWriter $xw
	* @param string $xmlname document element name
	* @param string $xmlns element namespace
	* @param int $mode
	*/
	public function toXmlWriter(\XMLWriter &$xw,$xmlname=NULL,$xmlns=NULL,$mode=XMLAdaptor::ELEMENT);

    /**
	*
	* Build Object from XML string
	* @param \XMLReader $xr
	* @return \com\servandserv\happymeal\xml\schema\AnyType
	*/
    public function fromXmlStr($source);
    
	/**
	*
	* Build Object from XMLReader
	* @param \XMLReader $xr
	* @return \com\servandserv\happymeal\xml\schema\AnyType
	*/
	public function fromXmlReader(\XMLReader &$xr);
}