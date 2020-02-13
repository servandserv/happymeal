<?php

namespace com\servandserv\happymeal\xml\schema;

class IDTypeValidator extends NCNameTypeValidator {

    public function __construct ( \com\servandserv\happymeal\xml\schema\IDType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }

}
