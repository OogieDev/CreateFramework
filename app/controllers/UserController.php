<?php

namespace app\controllers;


use app\models\User;
use fw\core\base\View;

class UserController extends AppController {

    public function signupAction(){
        View::setMeta('Регистрация');
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if($user->save('users')){
                $_SESSION['success'] = 'Вы успешно зарегестрированы';
            }else{
                $_SESSION['error'] = 'Ошибка! Попробуйте позже.';
            }
            redirect();
        }
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
            }else{
                $_SESSION['error'] = 'Логин или пароль введены неверно';
            }
            redirect();
        }
        View::setMeta('Вход');
    }

    public function logoutAction(){
        $this->view = false;
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        redirect('/user/login');
    }

}