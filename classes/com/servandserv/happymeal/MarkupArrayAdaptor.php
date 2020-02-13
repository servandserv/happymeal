<?php

namespace com\servandserv\happymeal;

/**
 *
 *
 * translate Array to Object
 *
 * Array vars key could have namespaces keys and nodes keys
 *
 * namespaces keys always starts with 'xmlns' and must belong to the set of character sequences denoted by the regular expression /^xmlns(:[a-z]+)?$/
 * for example
 *  xmlns namespace for elements without any prefix
 *  xmlns:ns0 namespace for elements with prefix ns0
 *
 * nodes keys must belong to the set of character sequences denoted by the regular expression \Adaptor\Data\ArrayTranslatorInt::XPATH
 * for example
 *  node
 *  node-0
 *  ns0:node
 *  ns0:node::node
 *  ns0:node::ns1:node
 *  ns0:node-0::ns1:node-0
 *  ns0:node-0::ns1:node-
 *
 *  :: - delimiter for tree nodes self::XPATH_DELIMITER
 *  : - delimiter for namespaces self::NS_DELIMITER
 *  -0 - delimiter for nodes with the same name with position in parent node
 *  -  - delimiter with tell us that the last node is an attribute
 */
interface MarkupArrayAdaptor {

    const NSS = "/^xmlns(:[a-z0-9]+)?$/";
    const XPATH = "/^(([a-z0-9]+:)?[a-zA-Z_]+(-[0-9]{1,3})?::){0,}([a-z0-9]*:)?[a-zA-Z_]+(-[0-9]{0,3})?$/";
    const XPATH_DELIMITER = "::";
    const NS_DELIMITER = ":";
    const POS_DELIMITER = "-";

    /**
     * @param $vars array array of vars
     * @param $nss array defaul namespaces
     */
    public function fromMarkupArray(array $vars, array $nss = []);
}
