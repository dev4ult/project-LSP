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
            $this->db->query("SELECT password FROM " . $tables[$i] . " WHERE username=:umail OR email=:umail");

            $this->db->bind("umail", $umail);

            $hashed_password = $this->db->single()['password'];
            if (hash("sha256", $password) == $hashed_password) {
                self::$username = $password;
                self::$user_table = $tables[$i];
                return true;
            }
        }

        return false;
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
        if ($this->accountCheck($umail, $password) == false) {
            Flasher::setFlash('Username / Email or Password is wrong', 'error');
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