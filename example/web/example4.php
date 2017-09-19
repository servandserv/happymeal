<?php

require_once(dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR.'bootstrap.php');
header( "Content-Type: application/xml" );

$markup = array(
    "xmlns:ns1" => "urn:com:servandserv:xml:atom",
    "Price::value" => 100.00,
    "Price::units" => "USD",
    "product" => "GDLS",
    "str" => "any string",
    "anyURI" => "urn:",
    "lang" => "RU-ru",
    "boolval" => true,
    "dt" => "2016-01-01",
    "dtt" => "2016-01-01T00:00:00",
    "dur" => "P1D",
    "byte" => 100,
    "short" => 32767,
    "int" => 1000000,
    "long" => 999999999999999,
    "integer" => 1,
    "decimal" => 0.01,
    "double" => 2.00,
    "float" => -3.66,
    "ID-" => "identificator",
    "ns1:Link-0::ns1:href" => "href1",
    "ns1:Link-0::ns1:rel" => "rel1",
    "ns1:Link-1::href" => "href2",
    "ns1:Link-1::rel" => "rel2"
);

$m = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\example\Model' );
$m->fromMarkupArray( $markup, array( "xmlns" => "urn:com:servandserv:example" ) );

$eh = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\happymeal\ErrorsHandler' );
if( $errors = $m->validateType( $eh ) ) {
    print $errors->toXmlStr();
} else {
    print( $m->toXmlStr() );
}
