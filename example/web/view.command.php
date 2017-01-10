<?php

require_once( dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR.'bootstrap.php');

$vf = new \com\servandserv\happymeal\views\ViewFactory();
$conf = [
    "POST" => [
        "request" => [],
        "response" => [
            [ "code" => 200, "application/xml" ],
            [ "code" => 200, "application/xml" ]
        ]
    ]
];
$port = \com\servandserv\happymeal\WADL\ClientAdapter::create( $conf, $vf );

$link = $port->request( new \com\servandserv\xml\atom\Link() );
$eh = new \com\servandserv\happymeal\ErrorsHandler();
if( $errors = $link->validateType( $eh ) ) {
    $port->response( $errors, 400 );
} else {
    /**
     * work with received data
     * ...
     * ...
     * and create response
     */
    $port->response( $link );
}