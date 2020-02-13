<?php

namespace com\servandserv\happymeal\xml\schema;

class LanguageType extends TokenType {

    const ROOT = "language";
    const NS = "http://www.w3.org/2001/XMLSchema";
    const PREF = NULL;

    public function validateType ( \com\servandserv\happymeal\ErrorsHandler $handler ) {
        $validator = \com\servandserv\happymeal\Bindings::create("com\servandserv\happymeal\xml\schema\LanguageTypeValidator",array( $this, $handler ));
        $validator->validate();
    }

    public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \com\servandserv\happymeal\XMLAdaptor::ELEMENT ) {
        if( $mode & \com\servandserv\happymeal\XMLAdaptor::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
        $xw->text( $this->__text() );
        if( $mode & \com\servandserv\happymeal\XMLAdaptor::ENDELEMENT ) $xw->endElement();
    }

}
