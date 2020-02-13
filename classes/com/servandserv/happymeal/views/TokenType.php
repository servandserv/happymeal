<?php

namespace com\servandserv\happymeal\views;

use \com\servandserv\happymeal\wadl\Router;
use \com\servandserv\happymeal\xml\schema\AnyType;

/**
 * Use TokenType for temporary data (manage user interface flow)
 *
 */
class TokenType implements Router {

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

    public function __construct($ts = self::CACHETIME) {
        $this->created = time();
        $this->expired = $this->created + $ts;
    }

    public function setId($val) {
        $this->id = $val;
        return $this;
    }

    public function setCreated($val) {
        $this->created = $val;
        return $this;
    }

    public function setExpired($val) {
        $this->expired = $val;
        return $this;
    }

    public function setQuery(Query $val) {
        $this->query = $val;
        return $this;
    }

    public function setRequest(AnyType $val = NULL) {
        $this->request = $val;
        return $this;
    }

    public function setResponse(AnyType $val = NULL) {
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

    public function redirect(AnyType $request = NULL, AnyType $response = NULL) {
        return FALSE;
    }

    public function onCallback(View $view) {
        return FALSE;
    }

    public function toXmlStr($xmlns = self::NS, $xmlname = self::ROOT, $pi = NULL) {
        $xw = new \XMLWriter();
        $xw->openMemory();
        $xw->setIndent(TRUE);
        $xw->startDocument("1.0", "UTF-8");
        if ($pi) {
            $xw->writePI("xml-stylesheet", "type=\"text/xsl\" href=\"".$pi."\"");
        }
        $this->toXmlWriter($xw, $xmlname, $xmlns);
        $xw->endDocument();
        return $xw->flush();
    }

    public function toXmlWriter(\XMLWriter $xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        $xw->startElementNS(NULL, $xmlname, $xmlns);
        if ($this->getId()) {
            $xw->writeElement("id", $this->getId());
        }
        if ($this->getCreated()) {
            $xw->writeElement("created", $this->getCreated());
        }
        if ($this->getExpired()) {
            $xw->writeElement("expired", $this->getExpired());
        }
        if ($this->getQuery()) {
            $this->getQuery()->toXmlWriter($xw);
        }
        if ($this->getRequest()) {
            $xw->startElement("Request");
            $req = $this->getRequest();
            $this->getRequest()->toXmlWriter($xw, $req::ROOT, $req::NS);
            $xw->endElement();
        }
        if ($this->getResponse()) {
            $xw->startElement("Response");
            $res = $this->getResponse();
            $this->getResponse()->toXmlWriter($xw, $res::ROOT, $res::NS);
            $xw->endElement();
        }
        $xw->endElement();
    }

}
