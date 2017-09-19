<?php
	namespace com\servandserv\happymeal\views;
		
	/**
	 * Container for environment parameters
	 * 
	 */
	class Env {
			
		const NS = "urn:com:servandserv:happymeal:views";
		const ROOT = "Env";
		const PREF = NULL;
		protected $params = [];

		public function setParam( Param $val ) {
			$this->params[] = $val;
			return $this;
		}
		public function getParams() {
		    return $this->params;
		}
		
		public function toXmlWriter( \XMLWriter $xw, $xmlname = self::ROOT, $xmlns = self::NS )
		{
		    $xw->startElementNS( NULL, $xmlname, $xmlns );
		    foreach( $this->params as $param ) {
		        $param->toXmlWriter( $xw );
		    }
		    $xw->endElement();
		}
	}

