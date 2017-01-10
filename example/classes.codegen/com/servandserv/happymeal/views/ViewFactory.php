<?php

namespace com\servandserv\happymeal\views;

use \com\servandserv\happymeal\views\TokenType;
use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\WADL\Router;

class ViewFactory implements Router
{

    const CACHETIME = 300;

    private $cachetime;
    private $referrer;
    private $callback;
    private $env;

    public function __construct( array $params = [], $cachetime = self::CACHETIME )
    {
        $this->cachetime = $cachetime;
        if( !isset( $_SESSION["routing"] ) ) {
            $_SESSION["routing"] = [];
        }
        if( !isset( $_SESSION["tokens"] ) ) {
            $_SESSION["tokens"] = [];
        }
        $referrerId = filter_input( INPUT_GET, "__referrer__" );
        if( isset( $_SESSION["tokens"][$referrerId] ) ) {
            $this->referrer = $_SESSION["tokens"][$referrerId];
        }
        $callbackId = filter_input( INPUT_GET, "__callback__" );
        if( isset( $_SESSION["tokens"][$callbackId] ) ) {
            $this->callback = $_SESSION["tokens"][$callbackId];
        }
        $this->env = new Env();
        foreach( $params as $k => $v ) {
            $this->env->setParam( $this->createParam( $k, $v ) );
        }
    }

    public function getReferrer()
    {
        return $this->referrer;
    }

    public function getCallback()
    {
        return $this->callback;
    }

    public function createView( TokenType $token )
    {
        $request = (new Request() )->setMethod( "GET" )->setUrl( filter_input( INPUT_SERVER, "SCRIPT_NAME" ) );
        foreach( $_GET as $k => $v ) {
            $request->setParam( $this->createParam( $k, $v ) );
        }
        $tokenId = hash_hmac( "md5", microtime( true ), filter_input( INPUT_SERVER, "SCRIPT_NAME" ) );
        $token->setId( $tokenId )->setCreated( microtime( true ) )->setRequest( $request );
        $_SESSION["tokens"][$tokenId] = $token;

        $view = ( new View() )
            ->setSessionId( session_id() )
            ->setToken( $token )
            ->setCallback( $this->callback )
            ->setReferrer( $this->referrer )
            ->setEnv( $this->env );

        //clean old tokens
        $this->clean();

        return $view;
    }

    public function createParam( $k, $v )
    {
        return ( new Param() )->setName( $k )->setValue( $v );
    }

    public function clean( $tokenId = NULL )
    {
        if( $tokenId && isset( $_SESSION["tokens"][$tokenId] ) ) {
            unset( $_SESSION["tokens"][$tokenId] );
        } else {
            foreach( $_SESSION["tokens"] as $id => $token ) {
                if( microtime( true ) - $token->getCreated() > $this->cachetime ) {
                    unset( $_SESSION["tokens"][$id] );
                }
            }
        }
    }

    public function createToken( $referrerId )
    {
        if( isset( $_SESSION["tokens"][$referrerId] ) ) {
            return $_SESSION["tokens"][$referrerId];
        }
    }

    public function redirect( AnyType $result = NULL )
    {
        if( $this->referrer ) {
            // check if errors
            if( $result && is_a( $result, 'com\servandserv\happymeal\Errors' ) ) {
                $this->referrer->setErrors( $result );
                $_SESSION["tokens"][$this->referrer->getId()] = $this->referrer;
            }
            $this->referrer->redirect( $result );
        }
    }

}
