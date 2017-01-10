<?php

	namespace com\servandserv\happymeal\views\View;
	
	/**
	 *
	 * Валидатор класса com\servandserv\happymeal\views\View\SessionId
	 *
	 */
	class SessionIdValidator extends \com\servandserv\happymeal\XML\Schema\StringTypeValidator {
		public function __construct( \com\servandserv\happymeal\XML\Schema\StringType $tdo = NULL, \com\servandserv\happymeal\ErrorsHandler $handler = NULL ) {
			
			parent::__construct( $tdo, $handler);
			$this->className = "SessionId";
			$this->nodeName = "sessionId";
			$this->targetNS = "urn:com:servandserv:happymeal:views";
			$this->classNS = "com:servandserv:happymeal:views:View";
		}
		public function validate() {
			parent::validate();
		}
	}
	

