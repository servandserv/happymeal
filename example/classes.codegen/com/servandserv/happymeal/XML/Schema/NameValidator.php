<?php

namespace com\servandserv\happymeal\XML\Schema;

class NameValidator extends TokenValidator 
{

	const PATTERN = "/^[_:A-Za-z][-.:\w]+$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\Name $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validateType () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
