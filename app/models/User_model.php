<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class User_model {
    private $username;
    private $db;
    private $table;

    public function __construct() {
        $this->username = 'Guest1001';
        $this->db = new Database();
        $this->table = "users";
    }

    public function getUsername() {
        return $this->username;
    }

    public function isEmailExist($email) {
        $this->db->query("SELECT * FROM {$this->table} WHERE email=:email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function sendEmailForVerify($email, $name) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'proctelearn@gmail.com';
        $mail->Password = 'cdzwbdwbewzgdsvw';

        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->setFrom('proctelearn@gmail.com');

        //Recipients
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Here is the subject';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';

        $mail->send();
    }

    public function addNewUser($data) {
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $passConf = htmlspecialchars($data['password-confirmation']);

        // check if email is already been used
        if ($this->isEmailExist($email)) {
            Flasher::setFlash('That email has already been used', 'error');
            return -1;
        }

        // check if password confirmation is not the same
        if ($password != $passConf) {
            Flasher::setFlash('Password confirmation is not the same');
            return -1;
        }

        $this->db->query("INSERT INTO {$this->table}(username, email, password) VALUES (:username, :email, :password)");

        // binding value
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('password', hash('sha256', $password));

        $this->db->execute();
        return $this->db->rowChangeCheck();
    }



    public function accountCheck($umail, $password) {
        $this->db->query("SELECT password FROM users WHERE username=:umail OR email=:umail AND password=:password");

        $this->db->bind("umail", $umail);
        $this->db->bind("password", hash('sha256', $password));

        $realPass = $this->db->single();
        var_dump($realPass);
        return $realPass;
    }

    public function setLoginSession($umail) {
        $this->db->query('SELECT username FROM users WHERE username=:umail OR email=:umail');
        $this->db->bind('umail', $umail);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $umail;
    }

    public function userLogin($data) {
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
}