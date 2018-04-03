<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\Bindings;
use \com\servandserv\happymeal\ErrorsHandler;

class AnyComplexTypeValidator extends AnyTypeValidator
{

    public function __construct( AnyComplexType $tdo, ErrorsHandler $handler )
    {
        parent::__construct( $tdo, $handler );
    }

    public function validate()
    {
        foreach( $this->__props as $k => $prop ) {
            if( method_exists( $this->tdo, $prop["getter"] ) ) {
                $val = call_user_func( array( $this->tdo, $prop["getter"] ) );
                if( $val === NULL && $prop["minOccurs"] == 0 ) continue;
                $vals = is_array( $val ) ? $val : [ $val ];
                foreach( $vals as $val ) {
                    if( is_object( $val ) && method_exists( $val, "validateType" ) ) {
                        $val->validateType( $this->validationHandler );
                    } else {
                        $v = Bindings::create(
                                $prop["validator"],
                                array(
                                Bindings::create( $prop["prototype"], array( $val ) ),
                                $this->validationHandler
                                )
                        );
                        $v->validate();
                    }
                }
            }
        }
    }

    protected function assertMinOccurs( $getter, $node, $minOccurs = 1 )
    {
        if( !method_exists( $this->tdo, $getter ) ) return;
        $val = $this->tdo->{$getter}();
        if( !$val && intval( $minOccurs ) !== 0 ) {
            $this->handleError(
                Bindings::create( self::ERROR_CLASS )
                    ->setTargetNS( $this->targetNS )
                    ->setName( $node )
                    ->setClassNS( $this->classNS.":".$this->className )
                    ->setRule( self::ASSERT_MIN_OCCURS )
                    ->setAssertion( $minOccurs )
                    ->setValue( NULL ) );
        }
        if( is_array( $val ) && $minOccurs > count( $val ) ) {
            $this->handleError(
                Bindings::create( self::ERROR_CLASS )
                    ->setTargetNS( $this->targetNS )
                    ->setName( $node )
                    ->setClassNS( $this->classNS.":".$this->className )
                    ->setRule( self::ASSERT_MIN_OCCURS )
                    ->setAssetion( $minOccurs )
                    ->setValue( count( $val ) ) );
        }
    }

    protected function assertMaxOccurs( $getter, $node, $maxOccurs = 1 )
    {
        if( !method_exists( $this->tdo, $getter ) ) return;
        $val = $this->tdo->{$getter}();
        if( is_array( $val ) || $maxOccurs == "unbounded" || count( $val ) <= $maxOccurs ) return;
        $this->handleError(
            Bindings::create( self::ERROR_CLASS )
                ->setTargetNS( $this->targetNS )
                ->setClassNS( $this->classNS.":".$this->className )
                ->setName( $node )
                ->setRule( self::ASSERT_MAX_OCCURS )
                ->setAssertion( $maxOccurs )
                ->setValue( count( $val ) ) );
    }

    protected function assertChoice( array $getters )
    {
        $notempty = [];
        foreach( $getters as $getter ) {
            if( !method_exists( $this->tdo, $getter ) ) return;
            $val = $this->tdo->{$getter}();
            if( is_array( $val ) && !empty( $val ) ) $notempty[] = $getter;
            elseif( !is_array( $val ) && $val !== NULL ) $notempty[] = $getter;
        }
        if( count( $notempty ) <= 1 ) return;
        $haystack = $needles = [];
        foreach( $this->__props as $k=>$prop ) {
            if( in_array( $prop["getter"], $getters ) ) {
                $haystack[] = $prop["nodeName"];
            }
            if( in_array( $prop["getter"], $notempty ) ) {
                $needles[] = $prop["nodeName"];
            }
        }
        $this->handleError(
            Bindings::create( self::ERROR_CLASS )
                ->setTargetNS( $this->targetNS )
                ->setClassNS( $this->classNS.":".$this->className )
                ->setName( $this->nodeName )
                ->setRule( self::ASSERT_CHOICE )
                ->setAssertion( implode( "|", $haystack ) )
                ->setValue( implode( ",", $needles ) ) );
    }

    protected function assertFixed( $getter, $node, $fixed )
    {
        if( !method_exists( $this->tdo, $getter ) ) return;
        $val = $this->tdo->{$getter}();
        if( $val == $fixed ) return;
        $this->handleError(
            Bindings::create( self::ERROR_CLASS )
                ->setTargetNS( $this->targetNS )
                ->setClassNS( $this->classNS.":".$this->className )
                ->setName( $node )
                ->setRule( self::ASSERT_FIXED )
                ->setAssertion( $fixed )
                ->setValue( $val ) );
    }

}
