<?php
require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

if ($auth->getSessIdNum() == 0) {
    //Fix error too many redirects
    if ($_SERVER['REQUEST_URI'] != '/login.php') {
        header('Location: /login.php');
    }
    if ($auth->checkPassword()) {
        $auth->saveSessIdToDb();
        header('Location: /index.php');
    }
} else {
    //Fix error too many redirects
    if ($_SERVER['REQUEST_URI'] == '/login.php') {
        header('Location: /index.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Управление пользователями</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body style="height: 100vh">