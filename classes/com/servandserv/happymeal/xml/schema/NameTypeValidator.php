<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class NameTypeValidator extends TokenTypeValidator 
{

	const PATTERN = "/^[_:A-Za-z][-.:\w]+$/";
	
	public function __construct ( NameType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validateType () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
