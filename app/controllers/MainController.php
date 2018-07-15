<?php

namespace app\controllers;


use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{

    public function indexAction()
    {
        $model = new Main;
        $posts = App::$app->cache->get('posts');
        if(!$posts){
            echo 'Зашли в sql';
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts, 3600 * 24);
        }
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
//        $this->set(compact('title', 'posts', 'menu', 'meta'));
        View::setMeta('Заголовок страницы', 'Описание страницы', 'Ключевые слова страницы');
    }

    public function testAction(){
        if($this->is_ajax()){

//            $data = ['answer' => 'Ответ с сервера', 'code' => 200];
//            echo json_encode($data);
           $model = new Main();
            $post = \R::findOne("posts", "id = {$_POST['id']}");
            $this->loadView('s_test', compact('post'));
            die;
        }

        $this->layout = 'test';
        View::setMeta('Описание главной страницы экшена тест', 'Описание', 'ключевые слова');
    }

}