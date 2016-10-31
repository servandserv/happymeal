<?php

namespace com\happymeal\XML\Schema;

class AnyType {
	
	const CONTENTS=0;
	const STARTELEMENT=1;
	const ENDELEMENT=2;
	const ELEMENT=3;
	
	const ROOT = "anyType";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
    protected $PI;
	
	protected $_text;
	
	public function _text( $text = NULL ) {
		if( $text !== NULL ) {
			$this->_text = $text;
		} else {
			return $this->_text;
		}
	}
	
	public function validateType( \com\happymeal\ValidationHandler $handler ) {}
	
	public function equals( \com\happymeal\XML\Schema\AnyType $obj ) {
		return $this == $obj;
	}

	public function toXmlStr( $xmlns=null, $xmlname=null ) {
		if($xmlns === null) {
			$xmlns = static::NS;
		}
		if($xmlname === null) {
			$xmlname = static::ROOT;
		}
		$xw = new \XMLWriter();
		$xw->openMemory();
		$xw->setIndent( TRUE );
		$xw->startDocument( "1.0", "UTF-8" );
        if( $this->PI ) {
            $xw->writePI("xml-stylesheet", "type=\"text/xsl\" href=\"".$this->PI."\"");
        }
		$this->toXmlWriter( $xw, $xmlname, $xmlns );
		$xw->endDocument();
		return $xw->flush();
	}

    public function setPI( $pi ) {
        $this->PI = $pi;
    }
    
    public function getPI() {
        return $this->PI;
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
		if( $this->_text ) $xw->text( $this->_text ) ;
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
				$this->_text = $xr->value;
			} elseif( $xr->nodeType == \XMLReader::END_ELEMENT && $root == $xr->localName ) {
				return $this;
			}
		}
		return $this;
	}
}