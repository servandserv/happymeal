<?php

namespace com\servandserv\happymeal\xml\schema;

class NCNameTypeValidator extends NameTypeValidator {

    public function __construct ( \com\servandserv\happymeal\xml\schema\NCNameType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) {
        parent::__construct( $tdo, $handler );
    }
}
