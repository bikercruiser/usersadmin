<?php

require $_SERVER['DOCUMENT_ROOT'] . '/include/autoloader.php';

if ($auth->getSessIdNum() != 0) {

    $data = $user->get()->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    header("HTTP/1.1 401 Unauthorized");
    echo "Error: 401 Unauthorized";
    exit;
}
?>