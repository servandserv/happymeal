<?php

require_once(dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR.'bootstrap.php');

$xmlstr = file_get_contents( '../data/xml/model.xml' );
$m = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\example\Model' );
$m->fromXmlStr( $xmlstr );
$xmlstr2 = $m->toXmlStr();

$m2 = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\example\Model' );
$m2->fromXmlStr( $xmlstr2 );
echo sprintf( "%s: %s\r\n", "serialize unserialize objects equal", var_export( $m2 == $m, TRUE ) );

$links = $m2->getLink( NULL, function($link) {
    return 1 == $link->getRel();
} );
echo sprintf( "%s: %s\r\n", "filter array field", var_export( 1 == count( $links ), TRUE ) );

$h = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\happymeal\ErrorsHandler' );
$m2->validateType( $h );
echo sprintf( "%s: %s\r\n", "0 errors found", var_export( 0 == count( $h->getErrors()->getError() ), TRUE ) );

$h = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\happymeal\ErrorsHandler' );
$m2->setProduct( "SGDDKELEMSM" );
$m2->validateType( $h );
echo sprintf( "%s: %s\r\n", "1 errors found", var_export( 1 == count( $h->getErrors()->getError() ), TRUE ) );

$arr = $m2->toJSONArray();
$arr["product"] = "DYDU";
//print_r($arr);

$m3 = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\example\Model' );
$m3->fromJSONArray( $arr );
$h = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\happymeal\ErrorsHandler' );
$m3->validateType( $h );
echo sprintf( "%s: %s\r\n", "0 errors found", var_export( 0 == count( $h->getErrors()->getError() ), TRUE ) );

$markup = array(
    "xmlns:ns1" => "urn:com:servandserv:xml:atom",
    "Price::value" => 100.00,
    "Price::units" => "USD",
    "product" => "GDLS",
    "str" => "dsdsds",
    "byte" => 100,
    "ID-" => "identificator",
    "ns1:Link-0::ns1:href" => "href1",
    "ns1:Link-0::ns1:rel" => "rel1",
    "ns1:Link-1::href" => "href2",
    "ns1:Link-1::rel" => "rel2"
);
$m4 = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\example\Model' );
$m4->fromMarkupArray( $markup, array( "xmlns" => "urn:com:servandserv:example" ) );
print $m4->toXmlStr();

$m5 = \com\servandserv\happymeal\Bindings::create( 'com\servandserv\xml\atom\Link' );
$m5->fromMarkupArray( array(
    "href" => "http://",
    "rel" => "user"
) );
print $m5->toXmlStr();
