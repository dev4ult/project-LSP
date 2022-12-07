<?php

class User_model {
    private $username = 'Guest1001';
    private $db;
    private $table;

    public function __construct() {
        $this->db = new Database();
        $this->table = "users";
    }

    public function getUsername() {
        return $this->username;
    }

    public function checkExistEmail($email) {
        $this->db->query("SELECT * FROM {$this->table} WHERE email=:email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function addNewUser($data) {
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);

        $this->db->query("INSERT INTO {$this->table}(username, email, password) VALUES (:username, :email, :password)");

        // binding value
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);

        $this->db->execute();
        return $this->db->rowChangeCheck();
    }
}