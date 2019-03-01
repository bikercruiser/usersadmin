<?php

class Db {
    
    public function connect() {
        
        require 'config/config.php';
        
        $dbc = new mysqli($db_host, $db_login, $db_password);
        
        if($dbc->connect_error) {
            die("Connection failed: " . $dbc->connect_error);
        }
        echo "Connect success!";
    }
}
?>