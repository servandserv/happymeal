<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\xml\schema\DoubleType;
use \com\servandserv\happymeal\ErrorsHandler;

class DoubleTypeValidator extends AnySimpleTypeValidator {

    const WHITESPACE = "collapse";
    const PATTERN = "/^([-+]?[0-9]*\.?[0-9]+((e|E)-?[0-9]+)?|NaN|-INF|INF)$/";

    //const PATTERN = "/[-+]?[0-9]*\.?[0-9]+/";

    public function __construct(DoubleType $tdo, ErrorsHandler $handler) {
        parent::__construct($tdo, $handler);
    }

    public function validate() {
        $this->assertPattern($this->tdo->__text(), $this::PATTERN);
    }

}
