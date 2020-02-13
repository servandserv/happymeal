<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\Bindings;
use \com\servandserv\happymeal\XMLAdaptor;

class BooleanType extends AnySimpleType {

    const ROOT = "boolean";
    const NS = "http://www.w3.org/2001/XMLSchema";
    const PREF = NULL;
    const VALIDATOR = 'com\servandserv\happymeal\xml\schema\BooleanTypeValidator';

    public function validateType(\com\servandserv\happymeal\ErrorsHandler $handler) {
        $validator = Bindings::create(self::VALIDATOR, [$this, $handler]);
        $validator->validate();
    }

    public function toXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = XMLAdaptor::ELEMENT) {
        if ($mode & XMLAdaptor::STARTELEMENT) {
            $xw->startElementNS(NULL, $xmlname, $xmlns);
        }
        $xw->text($this->__text());
        if ($mode & XMLAdaptor::ENDELEMENT) {
            $xw->endElement();
        }
    }

}
