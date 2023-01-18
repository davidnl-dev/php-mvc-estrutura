<?php

namespace app\routes;

class Router
{

    public static function load($controller)
    {

        $data = explode('@', $controller);

        $pageController = $data[0];
        $methodController = $data[1];

        $loadController = "app\\controllers\\$pageController";
        $insController = new $loadController;

        if (!class_exists($loadController)) :
            header('location: /erro');
        endif;

        if (!method_exists($insController, $methodController)) :
            header('location: /erro');
        endif;

        $ready = $insController->$methodController();
        return $ready;

    }

    public static function routes()
    {

        return [
            'get' => [
                '/' => fn () => self::load('HomeController@index'),
                '/erro' => fn () => self::load('ErrorController@index'),
            ],
            'post' => []
        ];

    }

    public static function run()
    {

        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $request = strtolower($_SERVER['REQUEST_METHOD']);
        $routes = Router::routes();

        if (!isset($routes[$request])) :
            header('location: /erro');
        endif;

        if (!array_key_exists($uri, $routes[$request])) :
            header('location: /erro');
        endif;

        $router = $routes[$request][$uri];
        $router();
        
    }
}
