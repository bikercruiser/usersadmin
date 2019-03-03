<?php

require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

$user = new User();
$result = $user->get();

$data = $result->fetch_all( MYSQLI_ASSOC );
echo json_encode($data);
?>