<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\xml\schema\ByteType;
use \com\servandserv\happymeal\ErrorsHandler;

class ByteTypeValidator extends ShortTypeValidator {

    const MININCLUSIVE = -128;
    const MAXINCLUSIVE = 127;

    public function __construct(ByteType $tdo, ErrorsHandler $handler) {
        parent::__construct($tdo, $handler);
    }

    public function validate() {
        parent::validate();
        $this->assertMaxInclusive($this->tdo->__text(), $this::MAXINCLUSIVE);
        $this->assertMinInclusive($this->tdo->__text(), $this::MININCLUSIVE);
    }

}
