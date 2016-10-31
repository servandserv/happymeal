<?php

//define( "SCHEMAS_PATH", "/web/schemas" );
define( "XML_SCHEMA_NS", "com\happymeal\XML\Schema" );
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
	"http://www.w3.org/1999/XSL/Transform" => "com:happymeal:XML:XSL",
	"http://www.w3.org/1999/xlink" => "com:happymeal:XML:XLink",
	"http://www.w3.org/1999/xhtml" => "com:happymeal:XML:XHTML",
	"http://www.w3.org/2001/XMLSchema" => "com:happymeal:XML:Schema",
	"http://www.together.at/2006/XPIL1.0" => "com:happymeal:XPIL",
	"http://www.wfmc.org/2002/XPDL1.0" => "com:happymeal:XPDL",
	"http://www.w3.org/2005/Atom" => "com:happymeal:XML:Atom"
);

$local_nss = array( 
    "urn:"
);

