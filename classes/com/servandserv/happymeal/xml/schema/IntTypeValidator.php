<?php

namespace com\servandserv\happymeal\xml\schema;

class IntTypeValidator extends LongTypeValidator {

    const MININCLUSIVE = -2147483648;
    const MAXINCLUSIVE = 2147483647;

    public function __construct ( \com\servandserv\happymeal\xml\schema\IntType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

    public function validate () {
        parent::validate();
        $this->assertMaxInclusive( $this->tdo->__text(), $this::MAXINCLUSIVE );
        $this->assertMinInclusive( $this->tdo->__text(), $this::MININCLUSIVE );
    }
}
