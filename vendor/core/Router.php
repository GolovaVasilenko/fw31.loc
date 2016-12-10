<?php
namespace vendor\core;


class Router
{
    protected static $routes = [];
    protected static $currentRoute = [];
    protected static $currentPath = "";

    public static function add($regexp, $route =[])
    {
        self::$routes[$regexp] = $route;
    }

    protected static function matchRoute($uri)
    {
        foreach(self::$routes as $pattern => $route){
            if(preg_match("~$pattern~i", $uri, $matches)){
                self::$currentPath = $matches[0];
                foreach($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                self::$currentRoute = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($uri)
    {
        if(self::matchRoute($uri)){
            $controller = "\app\controllers\\";
            if(isset(self::$currentRoute['directory']))
                $controller .= self::$currentRoute['directory'] . "\\";
            $controller .= self::upperCamelCase(self::$currentRoute['controller'] . "Controller");
            if(class_exists($controller)){
                $ctrlObj = new $controller(self::$currentRoute);
                $action = self::lowerCamelCase(self::$currentRoute['action']) . 'Action';

                if(method_exists($ctrlObj, $action)){
                    $ctrlObj->$action();

                    //return call_user_func_array($ctrlObj, $action, $args = []);
                }else{
                    echo "Action $controller::$action Not found";
                }
            }else{
                echo "Controller $controller Not found";
            }

        }else{
            http_response_code(404);
            include "404.html";
        }
    }

    protected static function upperCamelCase($className)
    {
        return str_replace(' ', '', $className = ucwords(str_replace('-', ' ', $className)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getPath()
    {
        return self::$currentPath;
    }

    public static function getRoute()
    {
        return self::$currentRoute;
    }
} 