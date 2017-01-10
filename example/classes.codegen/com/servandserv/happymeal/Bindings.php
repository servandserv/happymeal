<?php

namespace com\servandserv\happymeal;

/*
 * replace generated classes to class implementations
 * 
 * \com\servandserv\happymeal\Bindings::setClassMapping(
 *     array(
 *         'com\servandserv\happymeal\RelationMembers' => 'xxx\yyy\zzz\RelationMembersImpl'
 *     )
 * )
 */

/**
 * Description of Bindings
 *
 */
class Bindings 
{

    private static $classMapping;

    public static function setClassMapping($classMapping) 
    {
        self::$classMapping=$classMapping;
    }
    
    public static function getClassMapping() 
    {
        return self::$classMapping;
    }
    
    /**
     * @param string $className имя искомого класса
     * @param array $args массив параметров для конструктора класса
     * @param callable $callback функция которую следует выполнить после создания объекта
     *
     *
     */
    public static function create( $className, $args = array(), callable $callback = NULL )
    {
        if( isset( self::$classMapping[$className] ) ) {
            $cl = new \ReflectionClass(self::$classMapping[$className]);
            $obj = call_user_func_array( array( &$cl, 'newInstance' ), $args );
        } else {
            $cl = new \ReflectionClass($className);
            $obj = call_user_func_array( array( &$cl, 'newInstance' ), $args );
        }
        if( $callback ) {
            return call_user_func_array( $callback, array( $obj ) );
        } else {
            return $obj;
        }
    }
}
