<?php

require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

if ($auth->getSessIdNum() != 0) {
    $user->edit();
} else {
    header("HTTP/1.1 401 Unauthorized");
    echo "Error: 401 Unauthorized";
    exit;
}
?>