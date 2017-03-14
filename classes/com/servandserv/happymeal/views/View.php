<?php
	namespace com\servandserv\happymeal\views;
		
	class View {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "View";
		const PREF = NULL;

		protected $sessionId = null;
		protected $env = null;
		protected $token = null;
		protected $referrer = null;
		protected $callback = null;
		protected $errors;
		
		public function setSessionId ( $val ) {
			$this->sessionId = $val;
			return $this;
		}
		public function setEnv ( \com\servandserv\happymeal\views\Env $val ) {
			$this->env = $val;
			return $this;
		}
		public function setToken ( \com\servandserv\happymeal\views\TokenType $val ) {
			$this->token = $val;
			return $this;
		}
		public function setReferrer ( \com\servandserv\happymeal\views\TokenType $val = NULL ) {
			$this->referrer = $val;
			return $this;
		}
		public function setCallback ( \com\servandserv\happymeal\views\TokenType $val = NULL ) {
			$this->callback = $val;
			return $this;
		}
		public function setErrors ( \com\servandserv\happymeal\errors\Errors $val ) {
			$this->errors = $val;
			return $this;
		}
		public function getSessionId() {
			return $this->sessionId;
		}
		public function getEnv() {
			return $this->env;
		}
		public function getToken() {
			return $this->token;
		}
		public function getReferrer() {
			return $this->referrer;
		}
		public function getCallback() {
			return $this->callback;
		}
		public function getErrors() {
		    return $this->errors;
		}
		
		public function toXmlStr( $xmlns = self::NS, $xmlname = self::ROOT, $pi = NULL )
		{
		    $xw = new \XMLWriter();
		    $xw->openMemory();
		    $xw->setIndent( TRUE );
		    $xw->startDocument( "1.0", "UTF-8" );
            if( $pi ) {
                $xw->writePI("xml-stylesheet", "type=\"text/xsl\" href=\"".$pi."\"");
            }
		    $this->toXmlWriter( $xw, $xmlname, $xmlns );
		    $xw->endDocument();
		    return $xw->flush();
		}
		
		public function toXmlWriter( \XMLWriter $xw, $xmlname = self::ROOT, $xmlns = self::NS )
		{
		    $xw->startElementNS( NULL, $xmlname, $xmlns );
		    if( $this->getSessionId() ) $xw->writeElement( "sessionId", $this->getSessionId() );
		    if( $this->getEnv() ) $this->getEnv()->toXmlWriter( $xw );
		    if( $this->getToken() ) $this->getToken()->toXmlWriter( $xw, "Token" );
		    if( $this->getReferrer() ) $this->getReferrer()->toXmlWriter( $xw, "Referrer" );
		    if( $this->getCallback() ) $this->getCallback()->toXmlWriter( $xw, "Callback" );
		    if( $this->getErrors() ) $this->getErrors()->toXmlWriter( $xw );
		    $xw->endElement();
		}
	}