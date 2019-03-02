<?php

//require_once 'config/config.php';
//require 'include/classes/Db.class.php';
spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/classes/' . $class_name . '.class.php';
});

/*
$cls = new Db();
$cls->connect();
 * 
 */
require_once 'views/header.php';
require_once 'views/main.php';

require_once 'views/footer.php';
?>
