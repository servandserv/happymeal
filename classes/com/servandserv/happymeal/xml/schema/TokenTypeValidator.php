<?php

namespace com\servandserv\happymeal\xml\schema;

class TokenTypeValidator extends NormalizedStringTypeValidator {

    const WHITESPACE = "collapse";

    public function __construct (\com\servandserv\happymeal\xml\schema\TokenType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler) {
        parent::__construct($tdo, $handler);
    }

}
