<?php

set_include_path( dirname( dirname( __FILE__ ) )."/classes.codegen" );

spl_autoload_register(
    function ( $class ) {
    $filename = str_replace( array( '\\', ',' ), array( '/', '/' ), $class ).'.php';
    require_once( $filename );
} );
