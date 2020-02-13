<?php

namespace com\servandserv\happymeal;

abstract class Validator {

    const ERROR_CLASS = 'com\servandserv\happymeal\errors\Error';
    const ASSERT_MIN_OCCURS = "ASSERT_MIN_OCCURS";
    const ASSERT_MAX_OCCURS = "ASSERT_MAX_OCCURS";
    const ASSERT_CHOICE = "ASSERT_CHOICE";
    const ASSERT_FIXED = "ASSERT_FIXED";
    const ASSERT_SIMPLE = "ASSERT_SIMPLE";
    const ASSERT_PATTERN = "ASSERT_PATTERN";
    const ASSERT_MIN_INCLUSIVE = "ASSERT_MIN_INCLUSIVE";
    const ASSERT_MIN_EXCLUSIVE = "ASSERT_MIN_EXCLUSIVE";
    const ASSERT_MAX_INCLUSIVE = "ASSERT_MAX_INCLUSIVE";
    const ASSERT_MAX_EXCLUSIVE = "ASSERT_MAX_EXCLUSIVE";
    const ASSERT_LENGTH = "ASSERT_LENGTH";
    const ASSERT_MIN_LENGTH = "ASSERT_MIN_LENGTH";
    const ASSERT_MAX_LENGTH = "ASSERT_MAX_LENGTH";
    const ASSERT_ENUMERATION = "ASSERT_ENUMERATION";
    const ASSERT_FRACTION_DIGITS = "ASSERT_FRACTION_DIGITS";
    const ASSERT_BOOLEAN = "ASSERT_BOOLEAN";
    const ASSERT_TOTAL_DIGITS = "ASSERT_TOTAL_DIGITS";

    protected $validationHandler;

    public function __construct(\com\servandserv\happymeal\ErrorsHandler $handler = NULL) {
        $this->validationHandler = $handler;
    }

    protected function handleError(\com\servandserv\happymeal\errors\Error $error) {
        if (is_object($this->validationHandler)) {
            $this->validationHandler->handleError($error);
        } else {
            throw new \Exception("Validation error on ".$error->getRule()." ".$error->getAssertion(), 450);
        }
    }

    abstract public function validate();
}
