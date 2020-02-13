<?php

namespace com\servandserv\happymeal\xml\schema;

class LanguageTypeValidator extends TokenTypeValidator {

    const PATTERN = "/^[a-zA-Z]{1,8}(-[a-zA-Z0-9]{1,8})*$/";
    //const PATTERN = "/[a-zA-Z]{1,8}(-[a-zA-Z0-9]{1,8})*/";

    public function __construct ( \com\servandserv\happymeal\xml\schema\LanguageType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

    public function validate () {
        parent::validate();
        $this->assertPattern( $this->tdo->__text(), $this::PATTERN );
    }

}
