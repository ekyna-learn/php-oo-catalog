<?php

define('PROJECT_ROOT', __DIR__);

function class_loader($class) {
    // Pour Linux ou Mac:
    $class = str_replace('\\', '/', $class);

    require __DIR__ . '/src/' . $class . '.php';
}

spl_autoload_register('class_loader');

$dsn  = 'mysql:dbname=catalog2;host=127.0.0.1;port=9998';
$user = 'catalog2';
$pwd  = 'catalog2';

$connection = new \PDO($dsn, $user, $pwd);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
