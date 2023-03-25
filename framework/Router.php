<?php

namespace Framework;
//use App\Controllers;
//use function PHPSTORM_META\elementType;
define('PATH_TO_MODELS',$_SERVER['DOCUMENT_ROOT'].'/framework/');
include_once PATH_TO_MODELS.'/Exceptions/RouteNotFoundException.php';
include_once PATH_TO_MODELS.'/Exceptions/UnauthorizedException.php';

use Framework\Exceptions\MethodNotFoundException;
use Framework\Exceptions\RouteNotFoundException;
use Framework\Exceptions\UnauthorizedException;

class Router
{
    public static $routes = []; //use to be private
    private $request;
    public $auth;

    public function __construct(Request $request, Auth $auth)
    {
        $this->request = $request;
        $this->auth = $auth;
    }

    private function getCurrentRoute(): ?Route
    {
        $func = function($route): int {
            return $route->getType() == $this->request->getType() && preg_match($route->getMask(), $this->request->getPath());
        };
        $routes = array_filter(self::$routes, $func);
        if (!$routes) {
            return null;
        }
        $func2 = function($route_first, $route_second) {
            return count($this->getParamsForController($route_second)) - count($this->getParamsForController($route_first));
        };
        usort($routes, $func2);
        return $routes[0];
    }

    /**
     * @throws UnauthorizedException
     */
    private function checkAuth(Route $route)
    {
        $this->request = $this->auth->enrichByUser($this->request);
        if ($route->isRequireAuth() && !$this->request->getUser()) {
            //throw new UnauthorizedException();
        }
    }

    private function getParamsForController(Route $route)
    {
        $params = [];
        preg_match_all($route->getMask(), $this->request->getPath(), $params);
        //echo("<p>Params: ");
        //var_dump($params);

        //echo("<p>Params for controller: ");
        $func3 = function(array $value): int {
            return $value[0];
        };
        //var_dump(array_map($func3, array_slice($params, 1)));
        return array_map($func3, array_slice($params, 1));
    }

    /**
     * @throws MethodNotFoundException
     * @throws UnauthorizedException
     * @throws RouteNotFoundException
     */
    public function getContent()
    {
        $exec_route = $this->getCurrentRoute();
        if (!$exec_route) {
            //throw new RouteNotFoundException();
        };
        $this->checkAuth($exec_route);
        $controller_name = $exec_route->getControllerClass();
        $method_name = $exec_route->getControllerMethodName();
        $controller = new $controller_name();
        if (!method_exists($controller, $method_name)) {
            throw new MethodNotFoundException($method_name, $controller_name);
        }

        $params_to_controller = $this->getParamsForController($exec_route);
        return call_user_func_array([$controller, $method_name], array_merge(['request' => $this->request], $params_to_controller));

    }

    public static function addRoute($route)
    {
        array_push(self::$routes, $route);
    }
}