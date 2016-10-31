<?php

namespace com\happymeal\XML\Schema;

class AnySimpleType extends AnyType {
	
	const ROOT = "anySimpleType";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	
	public function __construct( $val = NULL ) {
		$this->_text( $val );
		return $this;
	}
	
	public function validateType ( \com\happymeal\ValidationHandler $handler ) {
		$validator = new \com\happymeal\XML\Schema\AnySimpleTypeValidator( $this, $handler );
		$validator->validate();
	}
	
	public function equals( \com\happymeal\XML\Schema\AnyType $obj ) {
		return $this->_text() === $obj->_text();
	}
	
	/**
	* Вывод в XMLWriter
	* @codegen true
	* @param XMLWriter $xw
	* @param string $xmlname Имя корневого узла
	* @param string $xmlns Пространство имен
	* @param int $mode
	*/
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \com\happymeal\XML\Schema\AnyType::ELEMENT ) {
		if( $mode & \com\happymeal\XML\Schema\AnyType::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
		if( $prop = $this->_text() ) $xw->text( $prop ) ;
		if( $mode & \com\happymeal\XML\Schema\AnyType::ENDELEMENT ) $xw->endElement();
	}
	
	/**
	* Чтение из XMLReader
	* @param XMLReader $xr
	*/
	public function fromXmlReader ( \XMLReader &$xr ) {
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
