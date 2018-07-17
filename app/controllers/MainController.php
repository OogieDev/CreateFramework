<?php

namespace app\controllers;


use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use PHPMailer\PHPMailer\PHPMailer;

class MainController extends AppController
{

    public function indexAction()
    {

        $model = new Main;

        $total = \R::count('posts');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $posts = \R::findAll('posts', "LIMIT $start, $perpage")  ;
        $menu = $this->menu;



        //        $posts = $model->findAll();
//        $posts2 = $model->findAll();
//        $post = $model->findOne('Вадим'); //первый параметр отвечает за то, по какуму значению будем искать where field = id а field не обязательный перезаписывает $this->pk модели
//        debug($post);
//        $data = $model->findBySql("SELECT name FROM $model->table ORDER BY id DESC");
//        $data = $model->findBySql("SELECT name FROM $model->table WHERE name LIKE ?", ['%а%']); //запрос с параметром. хз что значают знаки процента
//        $data = $model->findLike('а', 'name');
//        debug($data);
        $this->set(compact('posts', 'menu', 'pagination', 'total'));
        View::setMeta('Blog::Главная страница', 'Описание страницы', 'Ключевые слова страницы');
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