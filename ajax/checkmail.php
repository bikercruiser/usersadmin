<?php

require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

if ($auth->getSessIdNum() != 0) {

    if($user->checkMail() != 0) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    header("HTTP/1.1 401 Unauthorized");
    echo "Error: 401 Unauthorized";
    exit;
}
?>