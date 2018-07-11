<?php


namespace vendor\core;

class Router
{
    /**
     * Таблица маршрутов
     * @var array
     */
    protected static $routes = []; //все существующие правила
    /**
     * текущий маршрут
     * @var array
     */
    protected static $route = []; //текущий путь

    /**
     * добавляет маршрут в таблицу
     * @param $regexp регулярное выражение маршрута
     * @param array $route маршрут (controller, action, params)
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route; //добавляем новое правило с ключем в виде регулярного выражения а значением в виде массива, где первым элементом является название контроллера а вторым название метода этого контроллера
    }

    /**
     * возвращает таблицу маршрутов(для дебага)
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * возращает текущий маршрут
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * проверяет на соответствие запроса с нашими правилами для путкй
     * @param $url
     * @return bool
     */
    protected static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if(preg_match("#$pattern#i", $url, $matches))
            {
                foreach ($matches as $k => $v)
                {
                    if(is_string($k))
                    {
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * перенаправляет URL по корректному маршруту
     * @param string $url входящий URL
     * @return void
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);

        if(self::matchRoute($url))
        {
            $controller = 'app\\controllers\\' . self::$route['controller'];
            self::upperCamelCase($controller);
            if(class_exists($controller))
            {
                $cObj = new $controller(self::$route); //создаем объект контроллера если он существует
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                    $cObj->getView();
                }else
                {
                    echo "Метод <b>$controller::$action</b> не найден";
                }
            }else
            {
                echo "Контроллер <b>$controller</b> не найден";
            }
        }else
        {
            http_response_code(404);
            include '404.html';
        }
    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url){
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }

}