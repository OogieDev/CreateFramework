<?php

namespace app\controllers\admin;


class TestController extends AppController {

    public function indexAction(){
        echo 'main admin';
    }

    public function testAction(){
        echo 'test admin';
    }

}