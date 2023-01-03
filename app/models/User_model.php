<?php

class User_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchAllUser($type, $page) {
        $this->db->query("SELECT * FROM " . $type . " LIMIT :page, 5");
        $this->db->bind("page", $page * 5);

        return $this->db->resultSet();
    }
}