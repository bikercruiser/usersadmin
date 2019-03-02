<?php

spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/classes/' . $class_name . '.class.php';
});

$user = new User();
$user->edit();

//echo $_POST['id'];
?>