<?php

namespace app\controllers;


use app\models\Main;

class MainController extends AppController
{

    public function indexAction()
    {
        $model = new Main;
        $posts = \R::findAll('posts');
        $menu = $this->menu;
        //        $posts = $model->findAll();
//        $posts2 = $model->findAll();
//        $post = $model->findOne('Вадим'); //первый параметр отвечает за то, по какуму значению будем искать where field = id а field не обязательный перезаписывает $this->pk модели
//        debug($post);
//        $data = $model->findBySql("SELECT name FROM $model->table ORDER BY id DESC");
//        $data = $model->findBySql("SELECT name FROM $model->table WHERE name LIKE ?", ['%а%']); //запрос с параметром. хз что значают знаки процента
//        $data = $model->findLike('а', 'name');
//        debug($data);
        $this->setMeta('Главная страница', 'Описание главной страницы', 'слова ключевые');
        $meta = $this->meta;
        $title = 'Page title';
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    public function testAction(){
        $this->layout = 'test';
        $title = 'page main testacrion';
        $this->set(compact('title'));
    }

}