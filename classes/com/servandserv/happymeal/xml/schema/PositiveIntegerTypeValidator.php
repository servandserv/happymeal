<?php

namespace com\servandserv\happymeal\xml\schema;

class PositiveIntegerTypeValidator extends NonNegativeIntegerTypeValidator {

    const MININCLUSIVE = 1;

    public function __construct ( \com\servandserv\happymeal\xml\schema\PositiveIntegerType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

    public function validate () {
        parent::validate();
        $this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
    }
}
