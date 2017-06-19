<?php
	namespace com\servandserv\happymeal\views;
		
	class Query {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Query";
		const PREF = NULL;

		protected $url = null;
		protected $params = [];
		
		public function __construct( $url ) {
		    $this->url = $url;
		}
		public function setUrl ( $val ) {
			$this->url = $val;
			return $this;
		}
		public function setParam( Param $val ) {
			$this->params[$val->getName()] = $val;
			return $this;
		}
		public function getUrl() {
			return $this->url;
		}
		public function getParams() {
		    return $this->params;
		}
		public function getParam( $name ) {
		    return isset( $this->params[$name] ) ? $this->params[$name] : NULL;
		}
		
		public function toXmlWriter( \XMLWriter $xw, $xmlname = self::ROOT, $xmlns = self::NS )
		{
		    $xw->startElementNS( NULL, $xmlname, $xmlns );
		    $xw->writeElement( "url", $this->getUrl() );
		    foreach( $this->params as $name=>$param ) {
		        $param->toXmlWriter( $xw );
		    }
		    $xw->endElement();
		}
	}
