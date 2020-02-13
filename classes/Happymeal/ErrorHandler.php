<?php

namespace Happymeal;

interface ErrorHandler {
    public function throwError( \Exception $e );
}