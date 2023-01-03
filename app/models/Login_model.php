<?php

class Login_model {
    public static $username;
    public static $user_table;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function accountCheck($umail, $password) {
        $tables = ["admin", "asesi", "asesor"];
        for ($i = 0; $i < 3; $i++) {
            $this->db->query("SELECT username FROM " . $tables[$i] . " WHERE username=:umail OR email=:umail AND password=:password");

            $this->db->bind("umail", $umail);
            $this->db->bind("password", hash('sha256', $password));

            $check = $this->db->single();
            if ($check) {
                self::$username = $check;
                self::$user_table = $tables[$i];
                return $check;
            }
        }

        return -1;
    }

    public function validateLogin($data) {
        $umail = htmlspecialchars($data['umail']);
        $password = htmlspecialchars($data['password']);
        $captCode = htmlspecialchars($data['captcha-code']);
        $captConf = htmlspecialchars($data['captcha-confirmation']);

        // captcha check
        if ($captCode != $captConf) {
            Flasher::setFlash('Captcha is wrong');
            return false;
        }

        // account check
        if (!$this->accountCheck($umail, $password)) {
            Flasher::setFlash('Username / Email or Password is wrong');
            return false;
        } else {
            $this->setLoginSession($umail);
            return true;
        }
    }

    public function setLoginSession($umail) {
        $this->db->query("SELECT username FROM " . self::$user_table . " WHERE username=:umail OR email=:umail");
        $this->db->bind('umail', $umail);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $umail;
        $_SESSION['user-type'] = self::$user_table;
    }
}