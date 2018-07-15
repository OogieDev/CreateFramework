<?php

//require 'rb.php';
//require '../vendor/libs/functions.php';
//$db = require '../config/config_db.php';
//
//R::setup($db['dsn'], $db['user'], $db['pass'], $options);
//R::fancyDebug(true);


//R::freeze(true); //не дает библиотеке менять структуру таблицы
//var_dump(R::testConnection());

////Create
//$cat = R::dispense('category');
//$cat->title = 'Категория 3';
//echo R::store($cat);

//$cat = R::load('category', 2);
//debug($cat);
//echo $cat->title;

//Update
//$cat = R::load('category', 3);
//echo $cat->title . '<br>';
//$cat->title = 'измененная категория';
//R::store($cat);
//
//НЕ РЕКОМЕНДУЕТСЯ ТАКОЙ СПОСОБ UPDATE-А
//$cat = R::dispense('category');
//$cat->title = 'Еще раз изменили';
//$cat->id = 3;
//R::store($cat);

//DELETE
//$cat = R::load('category', 3);
//R::trash($cat);

//R::wipe('category');

//$cats = R::findAll('category');
//$cats = R::findAll('category', 'title LIKE ?', ['%cat%']);
//$cats = R::findAll('category', 'id > ?', [2]);
//$cat = R::findOne('category', 'id = 2');
//
//debug($cat);





$arr = ['233' => ['334', '432'], '3234' => '324'];

foreach($arr as $elem){
	echo '<br>';
	var_dump($elem);
}











