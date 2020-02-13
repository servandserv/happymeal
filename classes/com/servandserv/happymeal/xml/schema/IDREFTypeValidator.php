<?php

namespace com\servandserv\happymeal\xml\schema;

class IDREFTypeValidator extends NCNameTypeValidator {

    public function __construct ( \com\servandserv\happymeal\xml\schema\IDREFType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

}
