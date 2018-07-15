<?php

namespace app\controllers\admin;


use vendor\core\base\View;

class UserController extends AppController {



    public function indexAction(){
        View::setMeta('Админ панель');
        $test = 'Тестовая переменная';
        $data = ['tesct', 2];
//        $this->set([
//            'test' => $test,
//            'data' => $data,
//        ]);
        $this->set(compact('test', 'data'));

    }

    public function testAction(){
        
    }

}