<?php

namespace vendor\core;


class Db {

    use TSingleton;

    protected $pdo;
//    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct() {
        $db = require_once ROOT . '/config/config_db.php';
        require LIBS . '/rb.php';
        $db = require '../config/config_db.php';

        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze(true);
//        \R::fancyDebug(true);

        //        $options = [
//            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, //включаем все ошибки, связанные с бд
//            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, //говорим, чтобы при выборке формировались только ассоциативные массивы, а не смешанные
//        ];
//        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

//    public static function instance(){
//        if(self::$instance === null){
//            self::$instance = new self;
//        }
//        return self::$instance;
//    }

    /**
     * метод выполняет запрос в бд, при этом запрос в котором возвращать данные не нужно, тоесть это запрос на создание чегото, либо добавлениие
     * @param $sql
     * @return bool
     */
//    public function execute($sql, $params = []){
//        self::$countSql++;
//        self::$queries[] = $sql;
//        $stmt = $this->pdo->prepare($sql); //готовим sql запрос
//        return $stmt->execute($params); //выполняем
//    }
//
//    public function query($sql, $params = []){
//        self::$countSql++;
//        self::$queries[] = $sql;
//        $stmt = $this->pdo->prepare($sql);
//        $res = $stmt->execute($params);
//        if($res !== false){
//            return $stmt->fetchAll();
//        }
//        return [];
//    }

}