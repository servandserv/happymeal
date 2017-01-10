<?php

require_once(dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR.'bootstrap.php');

$view = ( new \com\servandserv\happymeal\views\ViewFactory( [
    "APP_NAME" => "Example",
    "ENVIRONMENT_VARIABLE_1" => "1"
    ] ) )->createView( new \com\servandserv\example\infrastructure\routing\ViewParentToken() );

header( "Content-Type: application/xml" );
print $view->toXmlStr( $view::NS, $view::ROOT, "stylesheets/view.parent.xsl" );
