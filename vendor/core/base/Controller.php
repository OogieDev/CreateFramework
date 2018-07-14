<?php

namespace vendor\core\base;


class Controller
{
    public $route = [];
    public $view;
    public $layout;

    /**
     * пользовательские данные
     * @var array
     */
    public $vars = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars){
        $this->vars = $vars;
    }

    public function is_ajax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }

    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }


}