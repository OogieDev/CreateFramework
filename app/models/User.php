<?php
/**
 * Created by PhpStorm.
 * User: Oogie
 * Date: 16.07.2018
 * Time: 17:02
 */

namespace app\models;


use fw\core\base\Model;

class User extends Model {

    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
        'role' => 'user',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6]
        ]
    ];

    public function checkUnique(){
        $user = \R::findOne('users', 'login = ? OR email = ? LIMIT 1', [$this->attributes['login'], $this->attributes['email']]);
        if($user){
            if($user->login == $this->attributes['login']){
                $this->errors['unique'][] = 'Этот логин уже занят';
            }
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Этот email уже используется';
            }
            return false;
        }
        return true;
    }

}