<?php

namespace com\servandserv\happymeal\xml\schema;

class IntegerTypeValidator extends DecimalTypeValidator {

    //const PATTERN = "/[\-+]?[0-9]+/";
    const FRACTIONDIGITS = "0";
    const PATTERN = "/^[\-+]?[0-9]+$/";

    public function __construct ( \com\servandserv\happymeal\xml\schema\IntegerType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

}
