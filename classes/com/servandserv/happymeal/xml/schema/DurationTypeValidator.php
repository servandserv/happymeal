<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class DurationTypeValidator extends AnySimpleTypeValidator {

    const WHITESPACE = "collapse";
    const PATTERN = "/^([\-\+])?P(?:([0-9]+)Y)?(?:([0-9]+)M)?(?:([0-9]+)D)?(?:T(?:([0-9]+)H)?(?:([0-9]+)M)?(?:([0-9]+(?:\.[0-9]+)?)?S)?)?$/";

    //const PATTERN = "/^([\-\+])?P(?:([0-9]+)Y)?(?:([0-9]+)M)?(?:([0-9]+)D)?(?:T(?:([0-9]+)H)?(?:([0-9]+)M)?(?:([0-9]+(?:\.[0-9]+)?)?S)?)$/";

    public function __construct(DurationType $tdo, ErrorsHandler $handler) {
        parent::__construct($tdo, $handler);
    }

    public function validate() {
        $this->assertPattern($this->tdo->__text(), $this::PATTERN);
    }

}
