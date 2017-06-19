<?php

namespace com\servandserv\happymeal\views;

interface StateRepository
{
    public function getStateId();
    public function registerToken( TokenType $token );
    public function findToken( $id );
    public function delToken( $id );
    public function emptyTrash();
}