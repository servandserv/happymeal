<?php

namespace com\servandserv\happymeal\views;

class TokenFactory
{

    public static function createToken ( $url )
    {
        $token = ( new TokenType() )
                ->setUrl( $url )
                ->setCreated( time() )
                ->setId( self::generateUid( $url, 32 ) );

        return $token;
    }

    public static function generateUid ( $ns, $len = 8 )
    {
        $hex = md5( $ns.uniqid( "", true ) );
        $pack = pack( 'H*', $hex );
        $uid = base64_encode( $pack ); // max 22 chars
        $uid = preg_replace( "#(*UTF8)[^A-Za-z0-9]#", "", $uid ); // mixed case
        if( $len < 4 ) $len = 4;
        if( $len > 128 ) $len = 128; // prevent silliness, can remove
        while( strlen( $uid ) < $len ) $uid = $uid.gen_uuid( 22 ); // append until length achieved

        return substr( $uid, 0, $len );
    }

}
