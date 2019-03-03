<?php

class User {

    private $id;
    private $fullname;
    private $email;
    private $addrss;
    private $dbc;

    function __construct() {

        $this->id           = $_POST['id'];
        $this->fullname     = $_POST['fullname'];
        $this->email        = $_POST['email'];
        $this->address      = $_POST['address'];
        $this->dbc          = Db::connect();
    }

    public function add() {
        
        $this->dbc->query("INSERT INTO User (fullname, email, address) VALUES('" .
                $this->fullname . "', '" .
                $this->email . "', '" .
                $this->address . "')");
    }

    public function edit() {
        //echo $this->id;
        
        $this->dbc->query("UPDATE User SET "
                . "fullname = '" . $this->fullname . "', "
                . "email = '" . $this->email . "', "
                . "address = '" . $this->address . "'"
                . "WHERE id = " . $this->id);
    }

    public function delete() {
        foreach($this->id as $id) {
            $this->dbc->query("DELETE FROM User WHERE id = '" . $id . "'");
        }
    }

    public function get() {
        return $this->dbc->query("SELECT id, fullname, email, address FROM User");
    }
}

?>