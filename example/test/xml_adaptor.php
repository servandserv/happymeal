<?php

require_once('bootstrap.php');

//print str_replace('\','\\',"test\ename");exit;

$xmlstr = file_get_contents('xml/Model.xml');
$m = \com\servandserv\happymeal\Bindings::create("\com\servandserv\Example\Model");
$m->fromXmlStr($xmlstr);
$xmlstr2 = $m->toXmlStr();

$m2 = \com\servandserv\happymeal\Bindings::create("\com\servandserv\Example\Model");
$m2->fromXmlStr($xmlstr2);
echo sprintf("%s: %s\r\n","serialize unserialize objects equal", var_export($m2==$m,TRUE));

$links = $m2->getLink(NULL,function($link) {
    return 1==$link->getRel();
});
echo sprintf("%s: %s\r\n","filter array field", var_export(1==count($links),TRUE));

$h = \com\servandserv\happymeal\Bindings::create("\com\servandserv\happymeal\ValidationHandler");
$m2->validateType($h);
echo sprintf("%s: %s\r\n","0 errors found", var_export(0==count($h->getErrors()->getError()),TRUE));

$h = \com\servandserv\happymeal\Bindings::create("\com\servandserv\happymeal\ValidationHandler");
$m2->setProduct("SGDDKELEMSM");
$m2->validateType($h);
echo sprintf("%s: %s\r\n","1 errors found", var_export(1==count($h->getErrors()->getError()),TRUE));

$arr = $m2->toJSONArray();
$arr["product"] = "DYDU";
//print_r($arr);

$m3 = \com\servandserv\happymeal\Bindings::create("\com\servandserv\Example\Model");
$m3->fromJSONArray( $arr );
$h = \com\servandserv\happymeal\Bindings::create("\com\servandserv\happymeal\ValidationHandler");
$m3->validateType($h);
echo sprintf("%s: %s\r\n","0 errors found", var_export(0==count($h->getErrors()->getError()),TRUE));

$markup = array(
    "xmlns:ns0"=>"urn:com:servandserv:Example:Model",
    "xmlns:ns1"=>"urn:com:servandserv:XML:Atom:Link",
    "ns0:Price::ns0:value"=>100.00,
    "ns0:Price::units"=>"USD",
    "ns0:product"=>"GDLS",
    "ns0:str"=>"dsdsds",
    "ns0:byte"=>100,
    "ns0:ID-"=>"ID",
    "ns1:Link-0::ns1:href"=>"href1",
    "ns1:Link-0::ns1:rel"=>"rel1",
    "ns1:Link-1::href"=>"href2",
    "ns1:Link-1::rel"=>"rel2"
);
$m4 = \com\servandserv\happymeal\Bindings::create("\com\servandserv\Example\Model");
$m4->fromMarkupArray($markup);
print $m4->toXmlStr();
