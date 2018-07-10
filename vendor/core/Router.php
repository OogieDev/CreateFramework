<?php


class Router
{

    protected static $routes = []; //все существующие правила
    protected static $route = []; //текущий путь

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route; //добавляем новое правило с ключем в виде регулярного выражения а значением в виде массива, где первым элементом является название контроллера а вторым название метода этого контроллера
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if($url == $pattern)
            {
                self::$route = $route;
                return true;
            }
        }
        return false;
    }


}