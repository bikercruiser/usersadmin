<?php

require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

if ($auth->getSessIdNum() != 0) {
    $auth->logout();
    header('Location: /login.php');
} else {
    header('Location: /login.php');
}
?>