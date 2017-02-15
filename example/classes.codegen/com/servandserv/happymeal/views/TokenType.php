<?php
	namespace com\servandserv\happymeal\views;
		
	/**
	 * Use TokenType for temporary data (manage user interface flow)
	 * 
	 */
	class TokenType {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "TokenType";
		const PREF = NULL;
		
		const CACHETIME = 300;

		protected $id = null;
		protected $created = null;
		protected $expired = null;
		protected $query = null;
		protected $request = null;
		protected $response = null;
		
		public function __construct( $ts = self::CACHETIME ) {
		    $this->created = microtime( true );
		    $this->expired = $this->created + $ts;
		}
		public function setId ( $val ) {
			$this->id = $val;
			return $this;
		}
		public function setCreated ( $val ) {
			$this->created = $val;
			return $this;
		}
		public function setExpired ( $val ) {
			$this->expired = $val;
			return $this;
		}
		public function setQuery ( \com\servandserv\happymeal\views\Query $val ) {
			$this->query = $val;
			return $this;
		}
		public function setRequest ( \com\servandserv\happymeal\XML\Schema\AnyType $val ) {
			$this->request = $val;
			return $this;
		}
		public function setResponse ( \com\servandserv\happymeal\XML\Schema\AnyType $val ) {
			$this->response = $val;
			return $this;
		}
		public function getId() {
			return $this->id;
		}
		public function getCreated() {
			return $this->created;
		}
		public function getExpired() {
			return $this->expired;
		}
		public function getQuery() {
			return $this->query;
		}
		public function getRequest() {
			return $this->request;
		}
		public function getResponse() {
			return $this->response;
		}
		
		public function toXmlWriter( \XMLWriter $xw, $xmlname = self::ROOT, $xmlns = self::NS )
		{
		    $xw->startElementNS( $xmlname, $xmlns );
		    if( $this->getId() ) $xw->writeElement( "id", $this->getId() );
		    if( $this->getCreated() ) $xw->writeElement( "created", $this->getCreated() );
		    if( $this->getExpired() ) $xw->writeElement( "expired", $this->getExpired() );
		    if( $this->getQuery() ) $this->getQuery()->toXmlWriter( $xw );
		    if( $this->getRequest() ) {
		        $xw->startElement( "Request" );
		        $this->getRequest()->toXmlWriter( $xw );
		        $xw->endElement();
		    }
		    if( $this->getResponse() ) {
		        $xw->startElement( "Response" )
		        $this->getResponse()->toXmlWriter( $xw );
		        $xw->endElement();
		    }
		    $xw->endElement();
		}
	}

