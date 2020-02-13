<?php

namespace com\servandserv\happymeal\xml\schema;

class NMTOKENTypeValidator extends TokenTypeValidator {

    //const PATTERN = "/[-\._:A-Za-z0-9]+/";
    const PATTERN = "/^[-\._:A-Za-z0-9]+$/";

    public function __construct ( \com\servandserv\happymeal\xml\schema\NMTOKENType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

    public function validate () {
        parent::validate();
        $this->assertPattern( $this->tdo->__text(), $this::PATTERN );
    }

}
