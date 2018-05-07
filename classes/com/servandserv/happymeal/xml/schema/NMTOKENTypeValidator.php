<?php

namespace com\servandserv\happymeal\xml\schema;

use \com\servandserv\happymeal\ErrorsHandler;

class NMTOKENTypeValidator extends TokenTypeValidator 
{

	//const PATTERN = "/[-\._:A-Za-z0-9]+/";
	const PATTERN = "/^[-\._:A-Za-z0-9]+$/";
	
	public function __construct ( NMTOKENType $tdo, ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
