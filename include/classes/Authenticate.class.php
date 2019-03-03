<?php

class Authenticate {

    private $login;
    private $password;

    function __construct() {

        require $_SERVER['DOCUMENT_ROOT'] . '/include/classes/Db.class.php';

        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $this->dbc = Db::connect();
        $this->cleanOldSessions();
        $this->sessionStart();
    }

    public function checkPassword() {
        if ($this->convPassToSha() == $this->getUserPassDb()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSessIdNum() {
        $result = $this->dbc->query("SELECT COUNT(session_id) FROM Session WHERE session_id = '" . session_id() . "'");
        while ($row = $result->fetch_assoc()) {
            $num_sessions = $row['COUNT(session_id)'];
        }
        return $num_sessions;
    }

    public function saveSessIdToDb() {
        $this->dbc->query("INSERT INTO Session (user_id, session_id, time) VALUES(" . $this->getUserId() . ", '" . session_id() . "', " . time() . ")");
    }

    private function getUserPassDb() {
        $result = $this->dbc->query("SELECT password FROM Authenticate WHERE login = '" . $this->login . "'");
        while ($row = $result->fetch_assoc()) {
            $sha_pass = $row['password'];
        }
        return $sha_pass;
    }

    private function convPassToSha() {
        return hash('sha256', $this->password);
    }

    private function getUserId() {
        $result = $this->dbc->query("SELECT id FROM Authenticate WHERE login = '" . $this->login . "'");
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
        }
        return $id;
    }

    private function cleanOldSessions() {
        $time = time() - COOKIE_LIFETIME;
        $this->dbc->query("DELETE FROM Session WHERE time < " . $time);
    }

    private function sessionStart() {
        session_start([
            'cookie_lifetime' => COOKIE_LIFETIME,
        ]);
    }

}

?>