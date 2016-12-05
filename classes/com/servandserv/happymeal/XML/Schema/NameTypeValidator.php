<?php

namespace com\servandserv\happymeal\XML\Schema;

class NameTypeValidator extends TokenTypeValidator 
{

	const PATTERN = "/^[_:A-Za-z][-.:\w]+$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\NameType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validateType () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
