<?php

namespace com\servandserv\happymeal\WADL\Application;

class Request2AnyTypeTranslator  implements AnyTypeTranslator
{

    public function translate( \com\servandserv\happymeal\XML\Schema\AnyType $adapter ) 
    {

		if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
			if (!isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
				$GLOBALS["HTTP_RAW_POST_DATA"] = file_get_contents("php://input");
			}
			if( $adapter && array_key_exists("CONTENT_TYPE", $_SERVER) &&
				strpos($_SERVER["CONTENT_TYPE"], "/xml") !== FALSE ) {
				$xr = new \XMLReader();
				if( $xr->XML( $GLOBALS["HTTP_RAW_POST_DATA"] ) ) {
				    $adapter->fromXmlReader( $xr );
				} else throw new \Exception( "Error on parse request XML data" );
			} else if( $adapter && array_key_exists("CONTENT_TYPE", $_SERVER) &&
				strpos($_SERVER["CONTENT_TYPE"], "/json") !== FALSE ) {
				if( $json = json_decode( $GLOBALS["HTTP_RAW_POST_DATA"], TRUE ) ) {
					$adapter->fromJSONArray( $json );
				} else throw new \Exception( "Error on parse request JSON data" );
			} else {
			    $adapter->fromMarkupArray( $_POST );
			}
			$GLOBALS["HTTP_RAW_POST_DATA"] = NULL;
		} else {
		    $adapter->fromMarkupArray( $_POST );
		}
		
	}

}