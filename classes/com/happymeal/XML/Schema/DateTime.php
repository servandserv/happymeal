<?php

namespace com\happymeal\XML\Schema;

class DateTime extends AnySimpleType {
	
	const ROOT = "dateTime";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	
	public function validateType ( \com\happymeal\ValidationHandler $handler ) {
		$validator = new \com\happymeal\XML\Schema\DateTimeValidator( $this, $handler );
		$validator->validate();
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
		$xw->text( $this->_text() );
		if( $mode & \com\happymeal\XML\Schema\AnyType::ENDELEMENT ) $xw->endElement();
	}
	
}