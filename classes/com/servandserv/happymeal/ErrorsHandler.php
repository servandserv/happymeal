<?php

namespace com\servandserv\happymeal;

use \com\servandserv\happymeal\errors\Error;

/**
 * errors container
 */
class ErrorsHandler {

    const ERRORS_DATA_OBJECT = 'com\servandserv\happymeal\errors\Errors';

    private $errors;

    public function __construct() {
        $this->clean();
    }

    public function handleError(Error $err) {
        $this->errors->setError($err);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function hasErrors() {
        return count($this->errors->getError()) > 0;
    }

    public function clean() {
        $this->errors = \com\servandserv\happymeal\Bindings::create(self::ERRORS_DATA_OBJECT);
    }

}
