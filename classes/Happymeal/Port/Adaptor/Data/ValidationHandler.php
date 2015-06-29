<?php

namespace Happymeal\Port\Adaptor\Data;

class ValidationHandler {

	private $errors;
	private $errLevel;

	public function __construct () {
		$this->clean();
	}

	public function handleError ( $error, $code ) {
		$this->errors[$code][] = $error;
		if( $this->errLevel < $code ) $this->errLevel = $code;
	}

	public function getErrors () {
		return $this->errors;
	}
	
	public function hasErrors() {
		return count( $this->errors ) > 0;
	}
	
	public function throwError( \Happymeal\ErrorHandler $h ) {
	    if($this->hasErrors()) {
			$errors = $this->getErrors();
			foreach($errors as $code=>$err){
				$h->throwError( new \Exception( implode( ";", $err ), $code ) );
			}
		}
	}

	public function clean () {
		$this->errors = array();
		$this->errLevel = NULL;
	}
	
	public function toJSON() {
		return json_encode( $this->getErrors(), JSON_UNESCAPED_UNICODE );
	}

}
