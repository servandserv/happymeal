<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\Bindings;
use \com\servandserv\happymeal\ErrorsHandler;
use \com\servandserv\happymeal\XMLAdaptor;

class AnyComplexType extends AnyType 
{
	
	const ANY_VALUE=0;
	const NOT_NULL=1;
	
	public function __construct()
	{
	    $this->_props = [];
	}
	
	public function equals( AnyType $obj ) 
	{
		return $this == $obj;
	}
	
	public function validateType ( ErrorsHandler $handler ) 
	{
		$validator = Bindings::create('com\servandserv\happymeal\xml\schema\AnyComplexTypeValidator',array( $this, $handler ));
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
	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = XMLAdaptor::ELEMENT ) {
		if( $mode & XMLAdaptor::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
		$this->attributesToXmlWriter( $xw, $xmlns );
		$this->elementsToXmlWriter( $xw, $xmlns );
		if( $mode & XMLAdaptor::ENDELEMENT ) $xw->endElement();
	}
	
	protected function attributesToXmlWriter( \XMLWriter &$xw, $xmlns = self::NS ) {
	    $counter = 0;
	    foreach( $this->__props as $k=>$prop) {
	        if($prop["attribute"]==true) {
	            if( method_exists( $this, $prop["getter"] ) ) {
	                $val = call_user_func( array( $this, $prop["getter"] ) );
	                if( $prop["xmlns"] !== $xmlns ) {
	                    $xw->writeAttributeNS( $prop["nodeName"], "ns".$counter, $prop["xmlns"], $val );
	                } else {
	                    $xw->writeAttribute( $prop["nodeName"], $val );
	                }
	            }
	        }
	        $counter++;
	    }
	}
	protected function elementsToXmlWriter( \XMLWriter &$xw, $xmlns = self::NS ) {
	    $counter=0;
	    foreach($this->__props as $k=>$prop) {
	        if($prop["attribute"]==false) {
	            if( method_exists( $this, $prop["getter"] ) ) {
	                $val = call_user_func( array( $this, $prop["getter"] ) );
	                if( $val === NULL ) continue;
	                $vals = is_array( $val ) ? $val : array( $val );
	                foreach( $vals as $val ) {
	                    if( $prop["xmlns"] == $xmlns ) {
	                        $xw->startElement( $prop["nodeName"] );
	                        if($prop["class"]) {
	                            $val->toXmlWriter( $xw, $prop["nodeName"], $prop["xmlns"], XMLAdaptor::CONTENTS );
	                        } else {
	                            $xw->text( $val );
	                        }
	                        $xw->endElement();
	                    } else {
	                        if($prop["class"]) {
	                            $val->toXmlWriter( $xw, $prop["nodeName"], $prop["xmlns"], XMLAdaptor::ELEMENT );
	                        } else {
	                            $xw->writeElement( $prop["nodeName"], $val );
	                        }
	                    }
	                }
	            }
	        }
	    }
	}
	
	
	
	public function fromXmlReader ( \XMLReader &$xr ) {
		while ( $xr->nodeType != \XMLReader::ELEMENT ) $xr->read();
		$root = $xr->localName;
		$this->attributesFromXmlReader( $xr );
		if ( $xr->isEmptyElement ) return $this;
		while ( $xr->read() ) {
			if ( $xr->nodeType == \XMLReader::ELEMENT ) {
				$xsinil = $xr->getAttributeNs( "nil", "http://www.w3.org/2001/XMLSchema-instance" ) == "true";
				$this->elementsFromXmlReader( $xr );
			} elseif ( $xr->nodeType == \XMLReader::END_ELEMENT && $root == $xr->localName ) {
				return $this;
			}
		}
		return $this;
	}
	
	protected function attributesFromXmlReader( \XMLReader &$xr ) {
	    $ns = $xr->namespaceURI;
		if( $xr->hasAttributes ) {
			while( $xr->moveToNextAttribute() ) {
			    $attrNS = $xr->namespaceURI ? $xr->namespaceURI : $ns;
			    foreach($this->__props as $k=>$prop) {
			        if( $prop["attribute"]==true &&
			            ($prop["xmlns"]==$attrNS || !$attrNS) &&
			            $xr->localName==$prop["nodeName"] &&
			            method_exists($this,$prop["setter"])) {
			            
			            call_user_func(array($this,$prop["setter"]),trim($xr->value));
			            break;
			        }
			    }
			}
			$xr->moveToElement();
		}
	}
	
	protected function elementsFromXmlReader( \XMLReader &$xr ) {
	    foreach($this->__props as $k=>$prop) {
			if( $prop["attribute"]==false &&
			    ($prop["xmlns"]==$xr->namespaceURI || !$xr->namespaceURI) &&
			    $xr->localName==$prop["nodeName"] &&
			    method_exists($this,$prop["setter"])) {
	            
	            if($prop["class"]) {
	                $val = Bindings::create($prop["class"]);
	                $val->fromXmlReader( $xr );
	                call_user_func( array( $this, $prop["setter"] ), $val );
	            } else {
	                call_user_func( array( $this, $prop["setter"] ), trim($xr->readString()) );
	            }
	            break;
	        }
	    }
	}
	
	public function toJSON( $jsonname = self::ROOT )
    {
        return json_encode( $this->toJSONArray(), JSON_UNESCAPED_UNICODE );
    }
	
	public function toJSONArray( $jsonname = self::ROOT )
    {
        $arr = [];
        foreach($this->__props as $k=>$prop) {
            $val = call_user_func( array( $this, $prop["getter"] ) );
            if($prop["class"]) {
                $vals = is_array( $val ) ? $val : array( $val );
                foreach( $vals as $val ) {
                    if(!$prop["array"]) {
                        $arr[$prop["nodeName"]] = $val->toJSONArray();
                    } else {
                        $arr[$prop["nodeName"]][] = $val->toJSONArray();
                    }
                }
            } else {
                $arr[$prop["nodeName"]] = $val;
            }
        }
        return $arr;
    }
	
	public function fromJSON( $json )
	{
	    if( $arr = json_decode( $json, TRUE ) ) {
	        return $this->fromJSONArray( $arr );
	    } else {
	        return NULL;
	    }
	}
	
	public function fromJSONArray( array $arr ) 
	{
	    foreach( $this->__props as $k=>$prop ) {
	        if(isset($arr[$prop["nodeName"]])&&method_exists($this,$prop["setter"])) {
	            $val = $arr[$prop["nodeName"]];
	            if($prop["class"]) {
	                if($prop["array"]&&is_array($val)) {
	                    foreach($val as $item) {
	                        if(is_array($item)) {
	                            $obj = Bindings::create( $prop["class"] );
	                            $obj->fromJSONArray( $item );
	                            call_user_func( array( $this, $prop["setter"] ), $obj );
	                        }
	                    }
	                } elseif(is_array($val)) {
	                    $obj = Bindings::create( $prop["class"] );
	                    $obj->fromJSONArray( $val );
	                    call_user_func( array( $this, $prop["setter"] ), $obj );
	                }
	            } elseif($prop["array"]&&is_array($val)) {
	                foreach($val as $item) {
	                    call_user_func( array( $this, $prop["setter"] ), $item );
	                }
	            } else {
	                call_user_func( array( $this, $prop["setter"] ), $val );
	            }
            }
        }
        return $this;
	}
	
	protected function modelFromTree( array $arr )
    {
        /*
         * nodeData example
         *
         *  => simpleType
         *
         *  [elementname] => Array (
         *       [prefix] => 
         *       [ns] => element namespace
         *       [localName] => elementname
         *       [elements] => Array
         *           (
         *               [0] =>  value 1
         *               [1] =>  value 2 (if array)
         *           )
         *       [attributes] => Array
         *           (
         *           )
         *   )
         * 
         *  [attrname] => array {
         *       [prefix] => 
         *       [ns] => attribute namespace
         *       [localName] => attrname
         *       [elements] => Array 
         *           (
         *           )
         *       [attributes] => Array
         *           (
         *                [0] => attribute value
         *           )
         *   )
         *
         * => complexType
         *
         *  [atom:Link] => Array (
         *      [prefix] => atom
         *      [ns] => urn:com:servandserv:XML:Atom:Link
         *      [localName] => Link
         *      [elements] => Array (
         *           [0] => Array (
         *               [atom:href] => Array (
         *                   [prefix] => atom
         *                   [ns] => urn:com:servandserv:XML:Atom:Link
         *                   [localName] => href
         *                   [elements] => Array
         *                       (
         *                           [0] => href1
         *                       )
         *                    [attributes] => Array
         *                       (
         *                       )
         *               )
         *           )
         *       )
         *   )
         */
        foreach( $arr as $nodeKey=>$nodeData ) {
            foreach($this->__props as $k=>$prop) {
                // if markup array hasn't namespaces check local name only
                if( ( $prop["xmlns"]===$nodeData["ns"] || $nodeData["ns"]===NULL ) &&
                    $prop["attribute"]===TRUE && 
                    $prop["nodeName"]===$nodeData["localName"] && 
                    count($nodeData["attributes"]) > 0 &&
                    method_exists($this,$prop["setter"]) ) {
                    
                    call_user_func(array($this,$prop["setter"]),trim($nodeData["attributes"][0]));
                }
                
                if( ( $prop["xmlns"]===$nodeData["ns"] || $nodeData["ns"]===NULL ) &&
                    $prop["attribute"]===FALSE &&
                    $prop["nodeName"]===$nodeData["localName"] &&
                    count($nodeData["elements"])>0 &&
                    method_exists($this,$prop["setter"]) ) {
                    
                    if($prop["class"] && $nodeData["complex"]===TRUE) {
                        // complexType
                        foreach($nodeData["elements"] as $el) {
                            $obj = Bindings::create($prop["class"]);
                            $obj->modelFromTree($el);
                            call_user_func(
                                array($this,$prop["setter"]),
                                $obj
                            );
                        }
                    } else {
                        // simpleType
                        foreach( $nodeData["elements"] as $el ) {
                            call_user_func(
                                array( $this, $prop["setter"] ),
                                trim($el)
                            );
                        }
                    }
                }
            }
        }
        return $this;
    }
}
