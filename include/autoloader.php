<?php

//Load config
require $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

//Autoload classess
spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/classes/' . $class_name . '.class.php';
});

//Load classes
$auth = new Authenticate();
$user = new User();
?>

