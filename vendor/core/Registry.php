<?php

namespace vendor\core;


class Registry {

    public static $objects = [];
    public static $instance;

    protected function __construct(){
        require_once ROOT . '/config/config.php';
        debug($config);
        foreach ($config['components'] as $name => $objects){
            self::$objects[$name] = new $objects();
        }
    }

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __get($name){
        if(is_object(self::$objects[$name])){
            return self::$objects[$name];
        }
    }

    public function __set($name, $object){
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object();
        }
    }

}