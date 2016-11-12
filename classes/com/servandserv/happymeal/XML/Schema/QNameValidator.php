<?php

namespace com\servandserv\happymeal\XML\Schema;

class QNameValidator extends AnySimpleTypeValidator 
{

	const PATTERN = "/^([_A-Za-z][-.\w]+|[_A-Za-z][-.\w]+:[_A-Za-z][-.\w]+)$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\QName $tdo, \com\servandserv\happymeal\ValidationHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->_text(), $this::PATTERN );
	}

}
