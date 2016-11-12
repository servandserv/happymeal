<?php

namespace \com\servandserv\happymeal\WADL;

use \com\servandserv\happymeal\WADL\Response;

class Resource
{
    private $id;
    private $path;
    private $queryType;
    private $methods = [];
    
    public function __construct($id=NULL,$path=NULL,$queryType="application/x-www-form-urlencoded")
    {
        $this->id=$id;
        $this->path=$path;
        $this->queryType=$queryType;
    }
    
    public function setPath($path)
    {
        $this->path=$path;
        return $this;
    }
    
    public function getPath()
    {
        return $this->path;
    }

    public function setMethod(\com\servandserv\happymeal\WADL\Method $m)
    {
        $this->methods[$m->getName()]=$m;
        return $this;
    }

    public function getMethod($name)
    {
        return isset($this->methods[$name])?$this->methods[$name]:NULL;
    }
    
    /**
     *
     * Обращение к ресурсу возможно несколькими методами
     * Допустимые методы должны быть зафиксированы описанием
     * при выполнении команды мы проверяем наличие метода 
     * в случае его отсутствия в описании выбрасываем ошибку
     * Method not alowed 
     */  
    public function run()
    {
        if(!$m = $this->getMethod($_SERVER["REQUEST_METHOD"])) throw new \Exception("Method not alowed",Response::METHOD_NOT_ALLOWED);
        $m->getRequest()->run($m->getResponses());
    }
}