<?php

require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

$auth = new Authenticate();
$auth->logout();
header('Location: /login.php');
?>