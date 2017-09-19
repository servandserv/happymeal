<?php

require_once(dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR.'bootstrap.php');
header( "Content-Type: application/json" );

$xmlstr = file_get_contents( "../data/xml/model.xml" );
$m = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\example\Model' );
$m->fromXmlStr( $xmlstr );

$eh = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\happymeal\ErrorsHandler' );
if( $errors = $m->validateType( $eh ) ) {
    print $errors->toJSON();
} else {
    print( $m->toJSON() );
}
