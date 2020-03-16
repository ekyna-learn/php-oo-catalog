<?php

define('PROJECT_ROOT', __DIR__);

function class_loader($class) {
    // Pour Linux ou Mac:
    if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
        $class = str_replace('\\', '/', $class);
    }

    require __DIR__ . '/src/' . $class . '.php';
}

spl_autoload_register('class_loader');

$dsn  = 'mysql:dbname=catalog;host=127.0.0.1;port=12221';
$user = 'catalog';
$pwd  = 'catalog';

$connection = new \PDO($dsn, $user, $pwd);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
