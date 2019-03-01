<?php

class Db {
    
    public static function connect() {
        
        require $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        
        $dbc = new mysqli($db_host, $db_login, $db_password, $db_name);
        
        if($dbc->connect_error) {
            die("Connection failed: " . $dbc->connect_error);
        }
        
        return $dbc;
    }
    
    /*
    public function insertData() {
        
    }
     * 
     */
}
?>