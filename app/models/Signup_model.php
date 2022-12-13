<?php

// sent to user email for verifying the new user
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// email validator to validate email
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

require '../vendor/autoload.php';


class Signup_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function isEmailRegistered($email) {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function sendOTPCode($email, $otp_code) {
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
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your account need to be verified first';
            $mail->Body = "<h3 style='padding: 1.25rem; font-size: 2rem; color: white; background-color: black; width: fit-content;'>$otp_code</h3>";
            $mail->AltBody = "OTP Code : $otp_code";

            $mail->send();
        } catch (Exception $e) {
            Flasher::setFlash("OTP code could not be sent");
        }
    }

    public function getOTPCode($email) {
        $this->db->query("SELECT otp_code FROM unreg_users WHERE email=:email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function delAfterReq($email) {
        $this->db->query("SELECT id FROM unreg_users WHERE email=:email");
        $this->db->bind('email', $email);
        $id = $this->db->single()['id'];

        $this->db->query("CREATE EVENT delete_row_:id 
                        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 2 Minute
                        DO DELETE FROM unreg_users WHERE email=:email");
        $this->db->bind('email', $email);
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function getUnregUser($email) {
        $this->db->query("SELECT username, email, password FROM unreg_users WHERE email=:email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function deleteTempUser($email) {
        $this->db->query("DELETE FROM unreg_users WHERE email=:email");
        $this->db->bind('email', $email);
        $this->db->execute();
    }

    public function insertNewUser($email) {
        $user = $this->getUnregUser($email);
        $this->db->query("INSERT INTO users(username, email, password) VALUES (:username, :email, :password)");

        $this->db->bind('username', $user['username']);
        $this->db->bind('email', $user['email']);
        $this->db->bind('password', $user['password']);

        $this->db->execute();
    }

    public function saveTempUser($username, $email, $password, $otp_code) {
        $this->db->query("INSERT INTO unreg_users(username, email, password, otp_code) VALUES (:username, :email, :password, :otp_code)");

        // binding value
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('password', hash('sha256', $password));
        $this->db->bind('otp_code', $otp_code);
        $this->db->execute();
    }

    public function isEmail($email) {
        $validator = new EmailValidator();
        return $validator->isValid($email, new RFCValidation());
    }

    public function validateSignup($data) {
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $passConf = htmlspecialchars($data['password-confirmation']);

        $otp_code = $data['otp-code'];

        // to check if there is an empty input
        if ($username == '' || $email == '' || $password == '' || $passConf == '') {
            Flasher::setFlash('Can not send unknown data input', 'error');
            return -1;
        }

        // to validate the email
        if (!$this->isEmail($email)) {
            Flasher::setFlash('Please input a correct email', 'error');
            return -1;
        }

        // check if email has already been used for a user account
        if ($this->isEmailRegistered($email)) {
            Flasher::setFlash('That email has already been used', 'error');
            return -1;
        }

        // check if password confirmation is not the same
        if ($password != $passConf) {
            Flasher::setFlash('Password confirmation is wrong', 'error');
            return -1;
        }

        if ($this->getOTPCode($email)) {
            Flasher::setFlash('This email has already requested for creating a new account, Please wait for 2 minutes after this account request for a new account', 'error');
            return -1;
        }

        $this->saveTempUser($username, $email, $password, $otp_code);

        return $this->db->rowChangeCheck();
    }
}