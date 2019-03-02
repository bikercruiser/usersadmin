<?php

spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/classes/' . $class_name . '.class.php';
});

//Header
require_once 'views/header.php';

//Main content
require_once 'views/loginform.php';

//Footer
require_once 'views/footer.php';
?>