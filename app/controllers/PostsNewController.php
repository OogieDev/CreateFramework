<?php

namespace app\controllers;

class PostsNewController extends AppController
{

    public function indexAction()
    {
        echo 'PostsNew index';
    }

    public function testAction()
    {
        echo 'test';
    }

    public function testPageAction()
    {
        echo 'testPage';
    }

    public function before()
    {
        echo 'PostsNew::before';
    }
}