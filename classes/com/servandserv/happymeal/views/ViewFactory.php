<?php

namespace com\servandserv\happymeal\views;

use \com\servandserv\happymeal\views\TokenType;
use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\WADL\Router;
use \com\servandserv\happymeal\Errors;
use com\servandserv\happymeal\errors\Error;

class ViewFactory implements Router
{

    const CACHETIME = 300;

    private $rep;
    private $referrer;
    private $callback;
    private $env;

    public function __construct( StateRepository $rep, array $params = [] )
    {
        $this->rep = $rep;
        //if( !isset( $_SESSION["routing"] ) ) {
        //    $_SESSION["routing"] = [];
        //}
        //if( !isset( $_SESSION["tokens"] ) ) {
        //    $_SESSION["tokens"] = [];
        //}
        $referrerId = filter_input( INPUT_GET, "__referrer__" );
        $this->referrer = $rep->findToken( $referrerId );
        $callbackId = filter_input( INPUT_GET, "__callback__" );
        $this->callback = $rep->findToken( $callbackId );
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

    public function createView( TokenType $token, array $state = [] )
    {
        $sn = filter_input( INPUT_SERVER, "SCRIPT_NAME" );
        $request = (new Request() )->setMethod( "GET" )->setUrl( $sn );
        // all request params
        foreach( $_REQUEST as $k => $v ) {
            $request->setParam( self::createParam( $k, $v ) );
        }
        $token->setId( self::createTokenId( $sn ) )
            ->setCreated( microtime( true ) )
            ->setRequest( $request );
        try {
            $this->rep->registerToken( $token );
            $view = ( new View() )
                ->setSessionId( $this->rep->getStateId() )
                ->setToken( $token )
                ->setCallback( $this->callback )
                ->setReferrer( $this->referrer )
                ->setEnv( $this->env );
        } catch( \Exception $e ) {
            $view = ( new View() )
                ->setSessionId( $this->rep->getStateId() )
                ->setErrors( ( new Errors() )->setError(
                    ( new Error )->setDescription( "Access denied" ) 
                ));
        }
        //clean old tokens
        $this->delOlderThen( $token->getCreated() - self::CACHETIME );

        return $view;
    }
    
    public static function createTokenId( $salt )
    {
        return hash_hmac( "md5", microtime( true ), $salt );
    }

    public static function createParam( $k, $v )
    {
        return ( new Param() )->setName( $k )->setValue( $v );
    }

    public function del( $tokenId )
    {
        if( $tokenId ) {
            $this->rep->delToken( $id );
        }
    }
    
    public function delOlderThen( $ts )
    {
        $this->rep->delOlderThen( $ts );
    }

    public function createToken( $referrerId )
    {
        return $this->rep->findToken( $referrerId );
    }

    public function redirect( AnyType $result = NULL )
    {
        if( $this->referrer && method_exists( $this->referrer, "redirect" ) ) {
            // check if errors
            if( $result && is_a( $result, 'com\servandserv\happymeal\Errors' ) ) {
                $this->referrer->setErrors( $result );
                $this->rep->registerToken( $this->referrer );
            }
            return $this->referrer->redirect( $result );
        }
        return FALSE;
    }

}
