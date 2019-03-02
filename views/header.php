<?php
$auth = new Authenticate();
if ($auth->checkPassword()) {
    session_start();
    $auth->saveSessIdToDb();
    header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Управление пользователями</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    </head>
    <body style="height: 100vh">