<?php

require_once('bootstrap.php');

$xmlstr = file_get_contents('xml/currency_bankiru.xml');
$m = \com\servandserv\happymeal\Bindings::create('ru\bystrobank\data\currency_bankiru\Group');
$m->fromXmlStr($xmlstr);
print $m->toXmlStr();