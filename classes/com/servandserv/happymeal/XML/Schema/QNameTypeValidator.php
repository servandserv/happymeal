<?php

namespace com\servandserv\happymeal\XML\Schema;

class QNameTypeValidator extends AnySimpleTypeValidator 
{

	const PATTERN = "/^([_A-Za-z][-.\w]+|[_A-Za-z][-.\w]+:[_A-Za-z][-.\w]+)$/";
	
	public function __construct ( \com\servandserv\happymeal\XML\Schema\QNameType $tdo, \com\servandserv\happymeal\ErrorsHandler $handler ) 
	{
		parent::__construct( $tdo, $handler );
	}

	public function validate () 
	{
		parent::validate();
		$this->assertPattern( $this->tdo->__text(), $this::PATTERN );
	}

}
