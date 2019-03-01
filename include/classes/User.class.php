<?php

class User {

    private $fullname;
    private $email;
    private $addrss;
    private $dbc;

    function __construct() {

        require $_SERVER['DOCUMENT_ROOT'] . '/include/classes/Db.class.php';

        $this->id           = $_POST['id'];
        $this->fullname     = $_POST['fullname'];
        $this->email        = $_POST['email'];
        $this->address      = $_POST['address'];
        $this->dbc          = Db::connect();
    }

    public function add() {
        $this->dbc->query("INSERT INTO User VALUES('" .
                $this->fullname . "', '" .
                $this->email . "', '" .
                $this->address . "')");
    }

    public function edit() {
        $this->dbc->query("UPDATE User SET'" .
                $this->fullname . "', '" .
                $this->email . "', '" .
                $this->address . "'");
    }

    public function delete() {
        $this->dbc->query("DELETE FROM User WHERE id = '" . $this->id . "'");
    }

}

?>