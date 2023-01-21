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

        if (isset($data['ingat-umail'])) {
            setcookie("ingat-umail", $umail, time() + (86400 * 30 * 12), "/");
        } else {
            setcookie("ingat-umail", $umail, time() - (86400 * 30 * 12), "/");
        }

        // captcha check
        if ($captCode != $captConf) {
            Flasher::setFlash('Captcha is wrong', "error");
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
        $_SESSION['username'] = $this->db->single()['username'];
        $_SESSION['user-type'] = self::$user_table;

        if (!isset($_COOKIE['last-activity'])) {
            $last_activity = [
                "admin" => ["first" => ["name" => "", "id" => ""], "second" => ["name" => "", "id" => ""], "lastChange" => "second"],
                "asesor" => ["first" => ["name" => "", "id" => ""], "second" => ["name" => "", "id" => ""], "lastChange" => "second"],
                "asesi" => ["first" => ["name" => "", "id" => ""], "second" => ["name" => "", "id" => ""], "lastChange" => "second"]
            ];
            setcookie('last-activity', json_encode($last_activity), time() + (86400 * 30), "/");
        }
        $_SESSION['last-activity'] = (array) json_decode($_COOKIE['last-activity']);
    }
}