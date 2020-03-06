<?php

define('PROJECT_ROOT', __DIR__);

function class_loader($class) {
    require __DIR__ . '/src/' . $class . '.php';
}

spl_autoload_register('class_loader');

$dsn  = 'mysql:dbname=catalog;host=localhost;port=3306';
$user = 'root';
$pwd  = 'root';

// TODO $connection = new \PDO($dsn, $user, $pwd);
