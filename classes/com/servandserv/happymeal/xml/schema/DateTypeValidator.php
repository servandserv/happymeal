<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\xml\schema\DateType;
use \com\servandserv\happymeal\ErrorsHandler;

class DateTypeValidator extends AnySimpleTypeValidator {

    const WHITESPACE = "collapse";
    const PATTERN = "/^-?[0-9]{4}-(0[0-9]|1[0-2])-([0-2][0-9]|3[01])$/";

    //const PATTERN = "/^(18|19|20)\d\d-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/";

    public function __construct(DateType $tdo, ErrorsHandler $handler) {
        parent::__construct($tdo, $handler);
    }

    public function validate() {
        $this->assertPattern($this->tdo->__text(), $this::PATTERN);
    }

}
