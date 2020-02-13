<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\errors\Error;
use \com\servandserv\happymeal\Bindings;
use \com\servandserv\happymeal\xml\schema\AnySimpleTypeValidator;
use \com\servandserv\happymeal\xml\schema\BooleanType;
use \com\servandserv\happymeal\ErrorsHandler;

class BooleanTypeValidator extends AnySimpleTypeValidator {

    const WHITESPACE = "collapse";

    public function __construct(BooleanType $tdo, ErrorsHandler $handler) {
        parent::__construct($tdo, $handler);
    }

    public function validate() {
        $this->assertBoolean($this->tdo->__text());
    }

    private function assertBoolean($value) {
        $normalized = $this->whitespace($value);
        if (is_bool($normalized) || in_array($normalized, ["0", "1", "true", "false"])) {
            return;
        }
        $this->handleError(
            Bindings::create(self::ERROR_CLASS)
                ->setTargetNS($this->targetNS)
                ->setClassNS($this->classNS)
                ->setName($this->nodeName)
                ->setRule(self::ASSERT_BOOLEAN)
                ->setValue($value));
    }

}
