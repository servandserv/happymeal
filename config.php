<?php

//define( "SCHEMAS_PATH", "/web/schemas" );
define( "XML_SCHEMA_NS", "com\servandserv\happymeal\XML\Schema" );
define( "XML_SCHEMA_TARGET_NS", "XML\Schema" );

$class_name_restrictions = array(
	'__halt_compiler', 
	'abstract', 'and', 'array', 'as', 
	'break', 
	'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 
	'declare', 'default', 'die', 
	'do', 
	'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 
	'final', 'for', 'foreach', 'function', 
	'global', 'goto', 
	'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 
	'list', 
	'namespace', 'new', 
	'or', 
	'print', 'private', 'protected', 'public', 
	'require', 'require_once', 'return', 
	'static', 'switch', 
	'throw', 'trait', 'try', 
	'unset', 'use', 
	'var', 
	'while', 
	'xor'
);

$nss_replacements = array(
	"http://www.w3.org/1999/XSL/Transform" => "com:servandserv:happymeal:XML:XSL",
	"http://www.w3.org/1999/xlink" => "com:servandserv:happymeal:XML:XLink",
	"http://www.w3.org/1999/xhtml" => "com:servandserv:happymeal:XML:XHTML",
	"http://www.w3.org/2001/XMLSchema" => "com:servandserv:happymeal:XML:Schema",
	"http://www.together.at/2006/XPIL1.0" => "com:servandserv:happymeal:XPIL",
	"http://www.wfmc.org/2002/XPDL1.0" => "com:servandserv:happymeal:XPDL",
	"http://www.w3.org/2005/Atom" => "com:servandserv:happymeal:XML:Atom",
	"http://wadl.dev.java.net/2009/02" => "com:servandserv:happymeal:WADL"
);

$local_nss = array( 
    "urn:"
);

