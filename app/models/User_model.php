<?php

class User_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchAllUser($type, $page) {
        $this->db->query("SELECT * FROM biodata_" . $type . " JOIN " . $type . " ON biodata_" . $type . ".id_akun = " . $type . ".id LIMIT :page, 5");
        $this->db->bind("page", $page * 5);

        return $this->db->resultSet();
    }

    public function fetchSingleUser($type, $id) {
        $this->db->query("SELECT * FROM biodata_" . $type . " JOIN " . $type . " ON biodata_" . $type . ".id_akun = " . $type . ".id WHERE id=:id");
        $this->db->bind("id", $id);

        return $this->db->single();
    }
}