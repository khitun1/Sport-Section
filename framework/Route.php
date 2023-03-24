<?php

namespace Framework;
class Route
{
    const METHOD_GET = 1;
    const METHOD_POST = 2;

    private $path;
    private $action;
    private $type;

    private $requireAuth = true;

    public function __construct($path, $action, $type)
    {
        $this->path = $path;
        $this->action = $action;
        $this->type = $type;
    }
    public function getParams(){
        $params = [];
        preg_match_all('/{([a-z]\w*)}/',$this->path,$params);
        return $params[0];
    }
    public function getMask(){

        $path = $this->path;
        $path =  preg_replace("/{[a-z]\w*}/","(\w*)",$path);
        return '~'.$path.'~';
    }


    public function getPath()
    {
        return $this->path;
    }


    public function getAction()
    {
        return $this->action;
    }

    public function getType()
    {
        return $this->type;
    }

    public function isRequireAuth(): bool
    {
        return $this->requireAuth;
    }

    public function getControllerClass(): string
    {
        return "App\Controllers\\".explode('@', $this->action)[0];
    }

    public function getControllerMethodName(): string
    {
        return explode('@', $this->action)[1];
    }


}
