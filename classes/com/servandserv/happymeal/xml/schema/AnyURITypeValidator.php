<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class AnyURITypeValidator extends AnySimpleTypeValidator {

    const WHITESPACE = "collapse";

    public function __construct(AnyURIType $tdo, ErrorsHandler $handler) {
        parent::__construct($tdo, $handler);
    }

    public function validate() {

    }

}
