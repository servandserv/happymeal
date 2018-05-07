<?php

namespace com\servandserv\happymeal\xml\schema;

//use \com\servandserv\data\MarkupArrayAdaptor;
//use \com\servandserv\data\JSONAdaptor;
//use \com\servandserv\data\XMLAdaptor;
use \com\servandserv\data\DataAdaptor;

use \com\servandserv\happymeal\ErrorsHandler;

class AnyType implements DataAdaptor
{
	const ROOT = "anyType";
	const NS = "http://www.w3.org/2001/XMLSchema";
	const PREF = NULL;
	
	protected $__text;
	
	public function __text( $text = NULL ) {
		if( $text !== NULL ) {
			$this->__text = $text;
		} else {
			return $this->__text;
		}
	}
	
	public function validateType( ErrorsHandler $handler ) {}
	
	public function equals( AnyType $obj ) {
		return $this == $obj;
	}

    public function fromXmlStr( $xmlstr )
    {
        $xr = new \XMLReader();
        try {
            $xr->XML( $xmlstr );
            return $this->fromXmlReader( $xr );
        } catch( \Exception $e ) {
            throw new \Exception( $e->getMessage().": $xmlstr" );
        }
    }

	public function toXmlStr( $xmlns=null, $xmlname=null, $pi = null ) {
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
        if( $pi ) {
            $xw->writePI("xml-stylesheet", "type=\"text/xsl\" href=\"".$pi."\"");
        }
		$this->toXmlWriter( $xw, $xmlname, $xmlns );
		$xw->endDocument();
		return $xw->flush();
	}

    public function fromXmlReader ( \XMLReader &$xr ) {
		while( $xr->nodeType != \XMLReader::ELEMENT ) $xr->read();
		$root = $xr->localName;
		if( $xr->isEmptyElement ) return $this;
		while( $xr->read() ) {
			if( $xr->nodeType == \XMLReader::TEXT ) {
				$this->__text = $xr->value;
			} elseif( $xr->nodeType == \XMLReader::END_ELEMENT && $root == $xr->localName ) {
				return $this;
			}
		}
		return $this;
	}

	public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = self::ELEMENT ) {
		if( $mode & self::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
		if( $this->__text ) $xw->text( $this->__text );
		if( $mode & self::ENDELEMENT ) $xw->endElement();
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
	    if(isset($arr[self::ROOT])) {
	        $this->__text = $arr[self::ROOT];
	    }
	    return $this;
	}
	
	public function toJSON( $jsonname = self::ROOT )
    {
        return json_encode( $this->toJSONArray( $jsonname ), JSON_UNESCAPED_UNICODE );
    }
	
	public function toJSONArray( $jsonname = self::ROOT )
    {
        return array($jsonname=>$this->__text);
    }
	
	
	public function fromMarkupArray ( array $vars, array $nss = [] ) 
	{
	    $nss = $this->nssFromMarkupArray( $vars, $nss );
        $tree = array();
        foreach( $vars as $k=>$v ) {
            if( $v != NULL && preg_match( self::XPATH,$k,$m ) ) {
                $nodes = preg_split( "/\\" . self::XPATH_DELIMITER . "/", $k, -1, PREG_SPLIT_NO_EMPTY);
                $this->treeFromPath( $nodes, $tree, $v, $nss, NULL );
            }
        }
        //print_r($tree);exit;
	    return $this->modelFromTree( $tree );
	}
	
	/**
	 *
	 * Check if param name starts with 'xmlns' and set param value as namespace
	 *
	 * @param $vars http request vars as array
	 * @param $nss default namespaces
	 * @return array request namespaces + default namespaces
	 *
	 */
	protected function nssFromMarkupArray( array $vars, array $nss ) 
    {
        foreach( $vars as $k=>$v ) {
            if( preg_match( self::NSS, $k, $m ) ) {
                $nss[$k] = $v;
            }
        }
        return $nss;
    }
    
    /**
     * Build tree from markup array data
     *  
     * nodeData example
     *
     *  => simpleType
     *
     *  [price] => Array (
     *       [prefix] => 
     *       [ns] => urn:com:servandserv:data:model
     *       [localName] => price
     *       [elements] => Array
     *           (
     *               [0] => price
     *           )
     *       [attributes] => Array
     *           (
     *               [0] => attr
     *           )
     *   )
     *
     * => complexType
     *
     *  [atom:Link] => Array (
     *      [prefix] => atom
     *      [ns] => urn:com:servandserv:xml:atom:Link
     *      [localName] => Link
     *      [elements] => Array (
     *           [0] => Array (
     *               [atom:href] => Array (
     *                   [prefix] => atom
     *                   [ns] => urn:com:servandserv:xml:atom:Link
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
     * 
     *
     * @param $path array of param name parts see self::XPATH
     * @param $tree array destination tree
     * @param $v mixed param value
     * @param $nss array target namespaces
     * @param $prefix string parent node prefix
     *
     */
    protected function treeFromPath( array $path, array &$tree, $v, array $nss, $prefix = NULL ) 
    {
        // get first node
        $node = array_shift( $path );
        if( substr($node,0,5) === "xmlns" ) return;
        $name = preg_split("/\\" . self::NS_DELIMITER . "/", $node, -1, PREG_SPLIT_NO_EMPTY);
        if( count( $name ) > 1 ) {
            $prefix = $name[0];
            array_shift( $name );
        }
        $pos = preg_split("/\\" . self::POS_DELIMITER . "/", $name[0], -1 );
        $localName = $pos[0];
        $nodeType = "elements";
        $position = 0;
        if( count( $pos ) > 1 ) {
            if($pos[1] === "") {
                $nodeType = "attributes";
            } else {
                $position = $pos[1];
            }
        }
        $nodeKey = $prefix ? $prefix.":".$localName : $localName;
        $xmlnsKey = $prefix ? ("xmlns:".$prefix) : "xmlns";
        // for markup arrays without any namespaces set NS to NULL and check nodes/attributes by local names only
        if( isset( $nss[$xmlnsKey] ) || count($nss)==0 ) {
            if( !isset( $tree[$nodeKey] ) ) {
                $tree[$nodeKey] = array(
                    "prefix"=>$prefix,
                    "ns"=> isset($nss[$xmlnsKey])?$nss[$xmlnsKey]:NULL,
                    "localName"=>$localName,
                    "complex"=>false
                );
            }
            if( !isset( $tree[$nodeKey]["elements"][$position] ) ) {
                $tree[$nodeKey]["elements"][$position] = array();
            }
            if( !isset( $tree[$nodeKey]["attributes"][$position] ) ) {
                $tree[$nodeKey]["attributes"][$position] = array();
            }
            if(count($path) > 0 ) {
                $tree[$nodeKey]["complex"] = true;
                $this->treeFromPath( $path, $tree[$nodeKey]["elements"][$position], $v, $nss, $prefix );
            } else {
                $tree[$nodeKey][$nodeType][$position] = $v;
            }
        }
    }
    
    protected function modelFromTree( array $arr )
    {
        if(isset($arr[self::ROOT])&&$arr[self::ROOT]["ns"]==self::NS) {
            $this->__text = trim($arr[self::ROOT]["elements"][0]);
        }
        return $this;
    }
}