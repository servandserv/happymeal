<?php
set_include_path( dirname( dirname( __FILE__ ) )."/happymeal/classes".PATH_SEPARATOR.$happymealBuildDir.
	PATH_SEPARATOR.$_SERVER["ILB_SERVICES_METALIBPHP_CLASSES"].
	PATH_SEPARATOR."/usr/share/php5/bb".
	PATH_SEPARATOR.get_include_path());

spl_autoload_register(
	function ( $class ) {
		$filename = str_replace( array( "\\", "_" ), array( "/", "/" ), $class ).".php";
		include_once( $filename );
	}
);