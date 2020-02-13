<?php

//define( "SCHEMAS_PATH", "/web/schemas" );
define( "XML_SCHEMA_NS", "com\servandserv\happymeal\xml\schema" );
define( "XML_SCHEMA_TARGET_NS", "XML\Schema" );
define( "HAPPYMEAL_TMP_NS", "com:servandserv:happymeal:tmp" );
define( "PROPERTY_PREFIX", "_" );

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
    /** javascript
    'break', 'case', 'catch', 'continue', 'debugger', 'default', 'delete', 'do', 'else', 'finally', 'for', 'function', 'if', 'in', 'instanceof', 
    'new', 'return', 'switch', 'this', 'throw', 'try', 'typeof', 'var', 'void', 'while', 'with',
    'class', 'const', 'enum', 'export', 'extends', 'import', 'super', 'implements', 'interface', 'let', 'package', 'private', 'protected', 'public',
    'static', 'yield',
    'null','true','false','NaN','Infinity','undefined'*/
);

$base_types_replacements = [
    'anyuri','boolean','byte','datetime','date','decimal','double','duration','float','idref','id','int',
    'integer','language','long','ncname','nmtoken','name','negativeinteger','nonnegativeinteger','nonpositiveinteger',
    'normalizedstring','positiveinteger','qname','short','string','time','token'
];

$nss_replacements = array(
    "http://www.w3.org/1999/XSL/Transform" => "com:servandserv:happymeal:xml:xsl",
    "http://www.w3.org/1999/xlink" => "com:servandserv:happymeal:xml:xlink",
    "http://www.w3.org/1999/xhtml" => "com:servandserv:happymeal:xml:xhtml",
    "http://www.w3.org/2001/XMLSchema" => "com:servandserv:happymeal:xml:schema",
    "http://www.together.at/2006/XPIL1.0" => "com:servandserv:happymeal:xpil",
    "http://www.wfmc.org/2002/XPDL1.0" => "com:servandserv:happymeal:xpdl",
    "http://www.w3.org/2005/Atom" => "com:servandserv:happymeal:xml:atom",
    "http://wadl.dev.java.net/2009/02" => "com:servandserv:happymeal:wadl"
);

$local_nss = array( "urn:" );

