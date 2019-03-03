<?php

require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

$user = new User();
$user->edit();

//echo $_POST['id'];
?>