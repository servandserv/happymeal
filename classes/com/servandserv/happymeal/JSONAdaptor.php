<?php

namespace com\servandserv\happymeal;

interface JSONAdaptor 
{
    /**
     *
     * @param string $jsonname json json object property name
     * @return string result of json_encode()
     *
     */
	public function toJSON( $jsonname = NULL );
	
	/**
     *
     * @param string $jsonname json json object property name
     * @return assoc array
     *
     */
	public function toJSONArray( $jsonname = NULL );
	
	/**
	 *
	 * @param string $json json string
	 * @return \com\servandserv\happymeal\XML\Schema\AnyType
	 */
	public function fromJSON( $json );
	
	/**
	 *
	 * @param array $json result of json_decode($json, true)
	 * @return \com\servandserv\happymeal\XML\Schema\AnyType
	 */
	public function fromJSONArray( array $arr );
}