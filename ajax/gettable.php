<?php

spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/classes/' . $class_name . '.class.php';
});

$user = new User();
$result = $user->get();


/*
if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {
        /*
        echo '<tr>' . "\n";
        echo '<td><input type="checkbox" name="id[]" value="' . $user_line['id'] . '"></td>' . "\n";
        echo '<td>' . $user_line['fullname'] . '</td>' . "\n";
        echo '<td>' . $user_line['email'] . '</td>' . "\n";
        echo '<td>' . $user_line['address'] . '</td>' . "\n";
        echo '<td><a href="#" id="' . $user_line['id'] . '">Изменить</a></td>' . "\n";
        echo '</tr>' . "\n";
         
         
        $data[] = json_encode($row);
    }
}
*/
$data = $result->fetch_all( MYSQLI_ASSOC );
echo json_encode($data);


?>