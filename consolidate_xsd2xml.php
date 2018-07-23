<?php

/*
 *
 * create united normalized schema document
 *
 */

include_once "consolidate_xsd2xml.conf.php";

$code = "";
$counter = 0; //nodes counter
$nss = $uniques = array();

$base = $argv[1];
if( !$argv[1] || !file_exists( $base ) || !is_dir( $base ) ) {
    trigger_error("Base directory '".$base."' is not directory\r\n" );
}
// path to generated classes
$buildDir = $base.DIRECTORY_SEPARATOR.$argv[2];
if( !$argv[2] || !file_exists( $buildDir ) || !is_dir( $buildDir ) ) {
    trigger_error ("Codegen directory '".$buildDir."' is not directory\r\n" );
}
// path schemas
$schemasPath = $argv[3];
if( !$schemasPath ) {
    trigger_error( "Schemas path empty\r\n" );
}
$schemas = explode( " ", $schemasPath );
// imported xsd schema files
$imports = array();
// collect all schemas xsd files in imports array
foreach( $schemas as $schema ) {
    if( file_exists( $schema ) ) {
        $fullname = realpath( $schema );
    } else {
        $fullname = realpath( $base.DIRECTORY_SEPARATOR.$schema );
        $fullname = preg_replace( "/\/{2,}/", "/", $fullname ); //убираем двойные слэши чтобы однозначно идентифицировать адрес импортируемого ресурса
        if( !file_exists( $fulname ) ) {
            trigger_error( "Schema file $fullname not exists\r\n" );
        }
    }
    if( is_dir( $fullname ) ) {
        $objects = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $fullname ),
            RecursiveIteratorIterator::SELF_FIRST );
        foreach( $objects as $name => $object ) {
            if( $object->isFile() && strpos( $object->getPathname(), ".xsd" ) != 0 ) {
                $imports[$object->getPathname()] = FALSE;
            }
        }
    } else {
        $imports[$fullname] = FALSE;
    }
}

//print_r( $imports );exit(1);
// create consolidated xml file with all imported schemas
$xw = new \XmlWriter();
$xw->openMemory();
$xw->setIndent( true );
$xw->setIndentString( " " );
$xw->startDocument( "1.0", "UTF-8" );
$xw->startElementNS( NULL, "schema", HAPPYMEAL_TMP_NS );

// get first schema to import
$notImported = getNotImported( $imports );
// do while schemas list has schemas to import
while( $notImported ) {
    $tree = array();
    import2assoc( $notImported, $xw );
    $notImported = getNotImported( $imports );
}
$xw->endElement();
$xw->endDocument();
print( $xw->flush() );
//file_put_contents('imported',print_r($imports,true));
exit( 0 );

/**
 * return first new xsd schema link
 * in imports array
 */
function getNotImported( $imports )
{
    foreach( $imports as $k => $v ) {
        if( $v === FALSE ) return $k;
    }
    return FALSE;
}


function import2assoc( $path, \XMLWriter &$xw )
{
    global $base, $imports, $nss, $nss_replacements, $tree;

    if( isset( $imports[$path] ) && $imports[$path] !== FALSE ) return array();
    if( !$xmlstr = file_get_contents( $path ) ) {
        trigger_error( "Can't read schemas file '$path'\r\n" );
    }
    
    try {
        $xr = new XMLReader();
        $xr->XML( $xmlstr );
        $tree[] = xml2assoc( $xr, $path, $xw );
    } catch( \Exception $e ) {
        trigger_error( "Error on parse schema XML $path\r\n" );
    }
    
}

// parse schema files
function xml2assoc( \XMLReader $xr, $path, \XMLWriter &$xw, $target = "", $ns_path = "" )
{
    global $uniques, $nss, $nss_replacements, $counter, $buildDir;

    $tree = null;
    while( $xr->read() )
            switch( $xr->nodeType ) {
            case XMLReader::END_ELEMENT:
                if( $xr->localName != "schema" && $xr->localName != "import" ) {
                    $xw->endElement();
                }
                return $tree;
            case XMLReader::ELEMENT:
                switch( $xr->localName ) {
                    case "schema":
                        // add every new schema to the tree
                        $tree = schema2assoc( $xr, $path, $xw );
                        break;
                    case "import":
                    case "include":
                        // import included schemas
                        import2assoc( href2realpath( $path, $xr->getAttribute( "schemaLocation" ) ), $xw );
                        break;
                    default:
                        $node = array(
                            "tag" => $xr->name,
                            "prefix" => $xr->prefix,
                            "localName" => $xr->localName
                        );
                        $node_hash = sha1( $target.$ns_path.$xr->readOuterXml() );
                        $node["attributes"] = [];
                        $uid = NULL;
                        if( $xr->hasAttributes ) {
                            while( $xr->moveToNextAttribute() ) {
                                if( $node["localName"] == "pattern" && !$xr->prefix ) {
                                    // for regex restriction nodes replace some symbols
                                    $val = str_replace( "/", "\/", $xr->value );
                                    $node["attributes"][$xr->name] = htmlentities( $val );
                                } else if( !$xr->prefix ) {
                                    $node["attributes"][$xr->name] = $xr->value;
                                }
                                // elements and types
                                if( $xr->localName == "name" && !$xr->prefix ) {
                                    $node["attributes"]["schemaName"] = $xr->value;

                                    // php class namespace
                                    $packagename = create_package_ns( $xr->value, $target );
                                    // php class name - for complex types
                                    $classname = create_class_name( $xr->value, $packagename );
                                    // php prop name - for simple types
                                    $propname = create_prop_name( $xr->value, $target, $node["localName"] );
                                    //$node["attributes"]["package"] = $packagename;
                                    $node["attributes"]["getter"] = "get".$propname;
                                    $node["attributes"]["setter"] = "set".$propname;
                                    $node["attributes"]["className"] = $classname;
                                    $node["attributes"]["propName"] = PROPERTY_PREFIX.$propname;
                                    $node["attributes"]["targetNS"] = $target;
                                    $node["attributes"]["classNS"] = create_class_ns( $packagename, $ns_path, $classname );
                                    //$node["attributes"]["classNS"] = str_replace( ":", "\\", $packagename );
                                    $node["attributes"]["class"] = $node["attributes"]["classNS"]."\\".$classname;
                                    $node["attributes"]["filePath"] = $buildDir.DIRECTORY_SEPARATOR.
                                        str_replace( "\\", DIRECTORY_SEPARATOR, $node["attributes"]["class"] );
                                    $uid = $node["attributes"]["class"];
                                }
                                if( in_array( $xr->localName, array( "type", "base", "itemType" ) ) && !$xr->prefix ) {
                                    $packagetypename = create_package_ns( $xr->value, $target );
                                    $typename = create_class_name( $xr->value, $packagetypename );
                                    $node["attributes"]["typeClassNS"] = create_class_ns( $packagetypename, "", $typename );
                                    //$node["attributes"]["typeClassNS"] = str_replace( ":", "\\", $packagetypename );
                                    $node["attributes"]["typeClassName"] = $typename;
                                    $node["attributes"]["typeClass"] = $node["attributes"]["typeClassNS"]."\\".$typename;
                                    $node["attributes"]["mode"] = 'XMLAdaptor::CONTENTS';
                                    //$uid = $node["attributes"]["typeClass"];
                                }
                                if( $xr->localName == "ref" && !$xr->prefix ) {
                                    $packagerefname = create_package_ns( $xr->value, $target );
                                    $refname = create_class_name( $xr->value, $packagerefname );
                                    $node["attributes"]["refClassNS"] = create_class_ns( $packagerefname, "", $refname );
                                    //$node["attributes"]["refClassNS"] = str_replace( ":", "\\", $packagerefname );
                                    $node["attributes"]["refClassName"] = $refname;
                                    $node["attributes"]["refClass"] = $node["attributes"]["refClassNS"]."\\".$refname;
                                    $node["attributes"]["mode"] = 'XMLAdaptor::ELEMENT';
                                    //$uid = $node["attributes"]["refClass"];
                                }
                                if( $xr->localName == "substitutionGroup" && !$xr->prefix ) {
                                    $package_subs_name = create_package_ns( $xr->value, $target );
                                    $subs_name = create_class_name( $xr->value );
                                    $node["attributes"]["subsClassNS"] = create_class_ns( $package_subs_name, "", $subs_name );
                                    //$node["attributes"]["subsClassNS"] = str_replace( ":", "\\", $package_subs_name );
                                    $node["attributes"]["subsClassName"] = $subs_name;
                                    $node["attributes"]["subsClass"] = $node["attributes"]["subsClassNS"]."\\".$subs_name;
                                    //$uid = $node["attributes"]["subsClass"];
                                }
                            }

                            $xr->moveToElement();
                        }
                        //if( $uid == NULL || ( $uid != NULL && !isset( $uniques[$uid] ) ) ) {
                        //print $uid."\r\n";
                        $xw->startElement( $xr->localName );
                        foreach( $node["attributes"] as $k => $v ) {
                            $xw->writeAttribute( $k, $v );
                        }
                        //$xw->writeAttribute( "_ID", md5( $counter++ ) );
                        $xw->writeAttribute( "_ID", $node_hash );
                        if( $xr->isEmptyElement ) {
                            $node["content"] = "";
                            $xw->endElement();
                        } else {
                            if( isset( $classname ) ) {
                                $new_path = ( $ns_path != "" ) ? $ns_path."\\".strtolower($classname) : strtolower($classname);
                            } else {
                                $new_path = $ns_path;
                            }
                            $node["content"] = xml2assoc( $xr, $path, $xw, $target, $new_path );
                        }
                        if( $uid != NULL && !isset( $uniques[$uid] ) ) $uniques[$uid] = $node;
                        $tree[] = $node;
                    //}
                }
                break;
            case XMLReader::TEXT:
            case XMLReader::CDATA:
                $xw->text( $xr->value );
                $tree .= $xr->value;
        }
    return $tree;
}

function schema2assoc( \XMLReader $xr, $path, \XMLWriter &$xw, $target = null )
{
    global $nss, $nss_replacements, $imports;

    $target = $xr->getAttribute( "targetNamespace" );
    $imports[$path] = $target;
    while( $xr->moveToNextAttribute() ) {
        // записываем информацию о пространствах имен указанных в схеме префиксов
        if( $xr->prefix == "xmlns" ) $nss[$target][$xr->localName] = replace_ns( $xr->value );
    }
    return xml2assoc( $xr, $path, $xw, $target );
}

/* utilities */

function replace_ns( $ns )
{
    global $nss_replacements;

    return isset( $nss_replacements[$ns] ) ? $nss_replacements[$ns] : $ns;
}

/**
 * class namespace
 * пространство имен класса
 * если имя класса является точным(без учета регистра) повторением последнего
 * отрезка пространства имен, то усекаем пространство имен
 *
 * namesapace\parent Parent Child => namespace\parent\child
 */

function create_class_ns( $package, $ns_path, $val )
{
    global $nss, $local_nss;
    
    //if( strtolower( substr( $package, -( strlen( $ns_path ) ) ) ) == strtolower( $ns_path ) ) {
    //    $package = substr( $package, 0, strlen( $package ) - ( strlen( "\\".$ns_path ) ) );
    //}
    $class_ns = $package.( ( $ns_path != "" ) ? "\\".$ns_path : "" );
    // Предотвращаем двойное усечение
    //if( !strtolower( substr( $ns_path, - ( strlen( $val ) ) ) ) == strtolower( $val ) ) {
    //    if( strtolower( substr( $class_ns, - ( strlen( $val ) ) ) ) == strtolower( $val ) ) {
    //        $class_ns = substr( $class_ns, 0, strlen( $class_ns ) - ( strlen( "\\".$val ) ) );
            //$class_ns = str_replace("\\".$val,"", $class_ns );
    //    }
    //}
    return str_replace( "\\\\", "\\", $class_ns );
}

/**
 * 
 * package namesapce
 * change global namespaces to local substitutes from conf file
 * change ':' symbol in namespace for '\'
 *
 */
function create_package_ns( $val, $target )
{

    global $nss, $local_nss;
    
    // chack if attribute name has namespace prefix
    $comma = strpos( $val, ":" );
    if( $comma !== false ) {
        // get prefix
        $pref = substr( $val, 0, $comma );
        // if unknown prefix namespace trigger error
        if( !isset( $nss[$target][$pref] ) ) trigger_error( "Undefined namespace prefix \"$pref\"" );
        else {
            // change target namespace to prefix namespace
            $target = $nss[$target][$pref];
        }
        // clean name from prefix, get localName of the element
        $val = substr( $val, $comma + 1 );
    }
    // change global namespaces to local substitutions
    $target = replace_ns( $target );
    // cut local path
    foreach( $local_nss as $local_ns ) {
        $target = str_replace( $local_ns, "", $target );
    }
    // change namespace separator
    $target = str_replace( ":", "\\", $target );
    //
    if( $target == XML_SCHEMA_TARGET_NS ) {
        return XML_SCHEMA_NS;
    } else {
        return $target;
    }
}

// get class name
// cut prefix
// change first symbol to CAPITAL version
// change symbol '-' to '_'
// if the name in reserved system names add word Type to name
function create_class_name( $val, $packagename )
{

    global $class_name_restrictions;
    global $base_types_replacements;

    $comma = strpos( $val, ":" );
    if( $comma ) {
        $pref = substr( $val, 0, $comma );
        $val = substr( $val, $comma + 1 );
    }
    $val = strtoupper( substr( $val, 0, 1 ) ).substr( $val, 1 );
    $val = str_replace( "-", "_", $val );
    if( in_array( strtolower( $val ), $class_name_restrictions ) ) {
        $val = $val."Type";
    }
    if( $packagename == 'com\servandserv\happymeal\xml\schema' && in_array( strtolower( $val ), $base_types_replacements ) ) {
        $val = $val."Type";
    }
    
    return $val;
}

/**
 * get property name
 * use prefix to avoid names collision
 *
 */
function create_prop_name( $val, $target, $ln )
{

    global $class_name_restrictions;

    $comma = strpos( $val, ":" );
    if( $comma ) {
        $pref = substr( $val, 0, $comma );
        $val = substr( $val, $comma + 1 );
    } else {
        $pref = "";
    }
    $val = strtoupper( $pref ).strtoupper( substr( $val, 0, 1 ) ).substr( $val, 1 );
    if( in_array( strtolower( $val ), $class_name_restrictions ) ) {
        $val = $val."Type";
    }
    
    return $val;
}

function href2realpath( $schemaPath, $includePath )
{
    if( preg_match( "/^https?:/", $schemaPath, $m ) ) {
        return $includePath;
    } else {
        return realpath( dirname( $schemaPath ).DIRECTORY_SEPARATOR.$includePath );
    }
}
