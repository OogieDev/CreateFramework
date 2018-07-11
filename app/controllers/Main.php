<?php

namespace app\controllers;


class Main extends App
{

    public function indexAction()
    {
        $name = 'Вадим';
        $title = 'Page title';
        $colors = [
            'white' => 'белый',
            'black' => 'черный'
        ];
        $this->set(compact('name', 'colors', 'title'));
    }

}