<?php
set_include_path( dirname(dirname(__FILE__))."/classes.codegen"/*.
    PATH_SEPARATOR.dirname(dirname(dirname(__FILE__)))."/classes"*/);
//require_once dirname(dirname(dirname(__FILE__))).'/vendor/autoload.php';

spl_autoload_register(
	function ( $class ) {
		$filename = str_replace( array( '\\', ',' ), array( '/', '/' ), $class ).'.php';
		require_once( $filename );
	}
);
