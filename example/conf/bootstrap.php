<?php

set_include_path(
    dirname( dirname( __FILE__ ) )."/classes.codegen".
    PATH_SEPARATOR.dirname( dirname( __FILE__ ) )."/classes"
);

spl_autoload_register(
    function ( $class ) {
    $filename = str_replace( array( '\\', ',' ), array( '/', '/' ), $class ).'.php';
    require_once( $filename );
} );

session_set_cookie_params( "0", dirname( $_SERVER["SCRIPT_NAME"] ) );
session_name( "PHPSESSID".sha1( dirname( $_SERVER["SCRIPT_NAME"] ) ) );
session_start();
if( isset( $_SERVER["REMOTE_USER"] ) ) $_SESSION[session_name()] = $_SERVER["REMOTE_USER"];
else if( isset( $_SERVER["REDIRECT_REMOTE_USER"] ) ) $_SESSION[session_name()] = $_SERVER["REDIRECT_REMOTE_USER"];
else $_SESSION[session_name()] = "Unknown";
