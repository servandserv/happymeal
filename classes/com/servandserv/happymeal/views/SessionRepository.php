<?php

namespace com\servandserv\happymeal\views;

class SessionRepository implements StateRepository
{
    public function __construct()
    {
        if( !isset( $_SESSION["tokens"] ) ) $_SESSION["tokens"] = [];
    }

    public function getStateId()
    {
        return session_id();
    }

    public function registerToken( TokenType $token )
    {
        $_SESSION["tokens"][$token->getId()] = $token;
        
        return $token;
    }
    
    public function findToken( $id )
    {
        if( isset( $_SESSION["tokens"][$id] ) ) {
            return $_SESSION["tokens"][$id];
        } else {
            return NULL;
        }
    }
    
    public function delToken( $id )
    {
        if( $tokenId && isset( $_SESSION["tokens"][$id] ) ) {
            unset( $_SESSION["tokens"][$id] );
            return TRUE;
        }
        return FALSE;
    }
    
    public function emptyTrash()
    {
        foreach( $_SESSION["tokens"] as $id => $token ) {
            if( !$token->getExpired() || time() > $token->getExpired() ) {
                unset( $_SESSION["tokens"][$id] );
            }
        }
    }
}