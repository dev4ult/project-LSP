<?php

// sent to user email for verifying the new user
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// email validator to validate email
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

// Load Composer's autoloader
require '../vendor/autoload.php';

class User_model {
    private $username;
    private $db;

    public function __construct() {
        $this->username = 'Guest1001';
        $this->db = new Database();
    }

    public function getUsername() {
        return $this->username;
    }

    public function isEmailRegistered($email) {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function sendEmailForVerify($email, $name, $otp_code) {
        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();

            $mail->Host = EMAIL_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL;
            $mail->Password = EMAIL_APP_PASS;

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = EMAIL_PORT;

            $mail->setFrom(EMAIL, EMAIL_FROM);

            //Recipients
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Your account need to be verified first';
            $mail->Body = "<h2>OTP Code</h2><h3 style='padding: 1.25rem; font-size: 2rem; color: white; background-color: black; width: fit-content;'>$otp_code</h3>";
            $mail->AltBody = "OTP Code : $otp_code";

            $mail->send();
        } catch (Exception $e) {
            Flasher::setFlash("OTP code could not be sent");
        }
    }

    public function delRowInPeriod($email) {
        $this->db->query("CREATE EVENT delete_row 
                        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 20 Second
                        DO DELETE FROM unreg_users WHERE email=:email");
        $this->db->bind('email', $email);
        $this->db->execute();
    }

    public function addNewUser($data) {
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $passConf = htmlspecialchars($data['password-confirmation']);
        $otp_code = $data['otp-code'];

        // check post data
        if ($username == '' || $email == '') {
            Flasher::setFlash('Username or email can not be empty', 'error');
            return -1;
        }

        // check if email is already been used
        if ($this->isEmailRegistered($email)) {
            Flasher::setFlash('That email has already been used', 'error');
            return -1;
        }

        // check if password confirmation is not the same
        if ($password != $passConf) {
            Flasher::setFlash('Password confirmation is not the same');
            return -1;
        }

        $this->db->query("INSERT INTO unreg_users(username, email, password, otp_code) VALUES (:username, :email, :password, :otp_code)");

        // binding value
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('password', hash('sha256', $password));
        $this->db->bind('otp_code', $otp_code);
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