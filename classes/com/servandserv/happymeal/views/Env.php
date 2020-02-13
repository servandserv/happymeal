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

    /**
     *
     * @param \com\servandserv\happymeal\views\Param $val
     * @return $this
     */
    public function setParam(Param $val) {
        $this->params[] = $val;
        return $this;
    }

    /**
     *
     * @return array of \com\servandserv\happymeal\views\Param
     */
    public function getParams() {
        return $this->params;
    }

    /**
     *
     * @param \XMLWriter $xw
     * @param type $xmlname
     * @param type $xmlns
     */
    public function toXmlWriter(\XMLWriter $xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        $xw->startElementNS(NULL, $xmlname, $xmlns);
        foreach ($this->params as $param) {
            $param->toXmlWriter($xw);
        }
        $xw->endElement();
    }

}
