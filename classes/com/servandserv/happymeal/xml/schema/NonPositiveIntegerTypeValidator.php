<?php

namespace com\servandserv\happymeal\xml\schema;

class NonPositiveIntegerTypeValidator extends IntegerTypeValidator {

    const MAXINCLUSIVE = 0;

    public function __construct ( \com\servandserv\happymeal\xml\schema\NonPositiveIntegerType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

    public function validate () {
        parent::validate();
        $this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
    }
}
