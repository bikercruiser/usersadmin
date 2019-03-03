<?php

class User {

    private $id;
    private $fullname;
    private $email;
    private $addrss;
    private $dbc;

    function __construct() {

        $this->id = $_POST['id'];
        $this->fullname = $_POST['fullname'];
        $this->email = $_POST['email'];
        $this->address = $_POST['address'];
        $this->sequence = $_POST['sequence'];
        $this->dbc = Db::connect();
    }

    public function add() {

        $this->dbc->query("INSERT INTO User (fullname, email, address) VALUES('" .
                $this->fullname . "', '" .
                $this->email . "', '" .
                $this->address . "')");

        //Update sequence column
        $this->dbc->query("UPDATE User SET sequence = id WHERE id = " . $this->dbc->insert_id);
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
        foreach ($this->id as $id) {
            $this->dbc->query("DELETE FROM User WHERE id = '" . $id . "'");
        }
    }

    public function get() {
        return $this->dbc->query("SELECT id, fullname, email, address, sequence FROM User ORDER BY sequence");
    }

    public function checkMail() {
        return $this->numMailInDb();
    }

    public function updateSequence() {
        $this->dbc->query("UPDATE User SET sequence = " . $this->sequence . " WHERE id = " . $this->id);
    }

    private function numMailInDb() {
        if (empty($this->id)) {
            $where = "email = '" . $this->email . "'";
        } else {
            $where = "email = '" . $this->email . "' AND id <> " . $this->id;
        }
        $result = $this->dbc->query("SELECT COUNT(email) FROM User WHERE " . $where);
        while ($row = $result->fetch_assoc()) {
            $num_email = $row['COUNT(email)'];
        }
        return $num_email;
    }

}

?>