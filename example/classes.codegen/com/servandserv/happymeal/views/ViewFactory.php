<?php

namespace com\servandserv\happymeal\views;

use \com\servandserv\happymeal\views\TokenType;
use \com\servandserv\happymeal\XML\Schema\AnyType;
use \com\servandserv\happymeal\WADL\Router;
use \com\servandserv\happymeal\Errors;
use com\servandserv\happymeal\errors\Error;

class ViewFactory implements Router
{

    private $rep;
    private $referrer;
    private $callback;
    private $token;
    private $env;

    public function __construct( StateRepository $rep, array $params = [] )
    {
        $this->rep = $rep;
        $referrerId = filter_input( INPUT_GET, "__referrer__" );
        $this->referrer = $rep->findToken( $referrerId );
        $callbackId = filter_input( INPUT_GET, "__callback__" );
        $this->callback = $rep->findToken( $callbackId );
        $this->env = new Env();
        foreach( $params as $k => $v ) {
            $this->env->setParam( new Param( $k, $v ) );
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
        $query = ( new Query() )->setUrl( $sn );
        // all query params
        foreach( $_GET as $k => $v ) {
            $query->setParam( new Param( $k, $v ) );
        }
        $token->setId( self::createTokenId( $sn ) )
            ->setQuery( $query );
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
        $this->emptyTrash();
        
        return $view;
    }
    
    public static function createTokenId( $salt )
    {
        return hash_hmac( "md5", microtime( true ), $salt );
    }

    public function del( $tokenId )
    {
        if( $tokenId ) {
            $this->rep->delToken( $id );
        }
    }
    
    public function emptyTrash()
    {
        $this->rep->emptyTrash();
    }
    

    public function createToken( $referrerId )
    {
        return $this->rep->findToken( $referrerId );
    }

    public function redirect( AnyType $request = NULL, AnyType $response = NULL )
    {
        if( $this->referrer ) {
            $this->referrer->setrequest( $request );
            $this->referrer->setResponse( $response );
            $this->rep->registerToken( $this->referrer );
            if( method_exists( $this->referrer, "redirect" ) ) {
                return $this->referrer->redirect( $request, $response );
            }
        }
        return FALSE;
    }

}
