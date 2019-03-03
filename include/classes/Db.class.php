<?php

class Db {
    
    public static function connect() {

        $dbc = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
        
        if($dbc->connect_error) {
            die("Connection failed: " . $dbc->connect_error);
        }        
        return $dbc;
    }
}
?>