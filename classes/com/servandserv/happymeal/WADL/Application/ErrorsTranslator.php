<?php

namespace com\servandserv\happymeal\WADL\Application;

interface ErrorsTranslator
{
    public function translate( \com\servandserv\happymeal\Errors $errors );
}