<?php

namespace com\happymeal;

/*
 * replace generated classes to class implementations
 * 
 * \com\happymeal\Bindings::setClassMapping(array("\com\happymeal\RelationMembers" => "\xxx\yyy\zzz\RelationMembersImpl"))
 */

/**
 * Description of Bindings
 *
 */
class Bindings {

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
     * @param class string  Class name
     * @param callback function Users callback function
     */
    public static function create($class,$callback=null) 
    {
        if(isset(self::$classMapping[$class])) {
            $obj = new self::$classMapping[$class]();
        } else {
            $obj = new $class();
        }
        if($callback) {
            return call_user_func_array($callback,array($obj));
        } else {
            return $obj;
        }
    }

}
