<?php

class Authenticate {

    private $login;
    private $password;

    function __construct() {

        require $_SERVER['DOCUMENT_ROOT'] . '/include/classes/Db.class.php';

        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $this->dbc = Db::connect();
    }

    public function checkPassword() {
        if($this->convPassToSha() == $this->getUserPassDb()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function saveSessIdToDb() {
        $this->dbc->query("INSERT INTO Session (user_id, session_id) VALUES(" . $this->getUserId() . ", '" . session_id() . "')");
    }
    
    private function getUserPassDb() {
        $result = $this->dbc->query("SELECT password FROM Authenticate WHERE login = '" . $this->login . "'");
        while($row = $result->fetch_assoc()) {
            $sha_pass = $row['password'];
        }
        return $sha_pass;
    }
    
    private function convPassToSha() {
        return hash('sha256', $this->password);
    }
    
    public function getUserId() {
        $result = $this->dbc->query("SELECT id FROM Authenticate WHERE login = '" . $this->login . "'");
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
        }
        return $id;
    }
}
?>