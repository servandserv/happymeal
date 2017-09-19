<?php

require_once(dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR.'bootstrap.php');

/**
  print "<pre>";
  print_r( $_SESSION );
  exit;
 */
$tokens = new \com\servandserv\happymeal\views\Tokens();
foreach( $_SESSION["tokens"] as $k => $token ) {
    $tokens->setToken( $token );
}

header( "Content-Type: application/xml" );
print $tokens->toXmlStr();
