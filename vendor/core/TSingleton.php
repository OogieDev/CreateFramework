<?php
/**
 * Created by PhpStorm.
 * User: Oogie
 * Date: 14.07.2018
 * Time: 18:48
 */

namespace vendor\core;


trait TSingleton {

    protected static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}