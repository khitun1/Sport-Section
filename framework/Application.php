<?php

namespace Framework;


class Application
{
    public static function init(){
        require "app/routes.php";
        //echo "Приложение инициализировано<p>";
        foreach (Router::$routes as $route){
            $route->getParams();
        }
        foreach (Router::$routes as $route){
            $route->getMask();
        }
    }
}