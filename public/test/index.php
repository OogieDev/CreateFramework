<?php
/**
 * Created by PhpStorm.
 * User: Oogie
 * Date: 13.07.2018
 * Time: 23:01
 */

$config = [
    'components' => [
        'cache' => 'classes\Cache',
        'test' => 'classes\Test',
    ],
];

spl_autoload_register(function ($class)
{
    $file = str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});

class Registry {

    public static $objects = [];
    protected static $instance;

    protected function __construct(){
        global $config;
        foreach($config['components'] as $name => $component){
            self::$objects[$name] = new $component;
        }
    }

    public function getList(){
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
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
        return;
    }

    public function __set($name, $object){
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object();
        }
    }

}

$app = Registry::instance();
$app->cache->ahaha();
$app->test->hey();
$app->test_two = 'classes\Test2';
$app->test_two->go();
echo $app->test_two->name;
echo $app->test_two->name = "John";