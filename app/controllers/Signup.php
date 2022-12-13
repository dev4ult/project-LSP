<?php

class Signup extends Controller {
    public function index() {
        $data['page-title'] = "Signup Page";
        $this->view('templates/header', $data);

        $this->view('templates/navbar/main-navbar');
        $this->view('signup/index');
        $this->view('templates/footer');
    }

    public function add() {
        $signup_model = $this->model('Signup_model');

        if ($signup_model->validateSignup($_POST) > 0) {
            $signup_model->sendOTPCode($_POST['email'], $_POST['otp-code']);
            Flasher::setFlash('OTP Code has been sent to your email', 'success');

            $signup_model->delAfterReq($_POST['email']);

            $_SESSION['unreg_email'] = $_POST['email'];
            $_SESSION['unreg_username'] = $_POST['username'];
            $_SESSION['unreg_password'] = $_POST['password'];

            header('Location: ' . BASEURL . '/signup/verify');
        } else {
            header('Location: ' . BASEURL . '/signup');
        }
        exit;
    }

    public function verify() {
        if (isset($_SESSION['unreg_email'])) {
            $data['page-title'] = "Verifying...";
            $this->view('templates/header', $data);

            $data['unreg-email'] = $_SESSION['unreg_email'];
            $data['unreg-username'] = $_SESSION['unreg_username'];
            $data['unreg-password'] = $_SESSION['unreg_password'];

            $this->view('signup/verify', $data);

            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/signup');
            exit;
        }
    }

    public function checkotp() {
        $signup_model = $this->model('Signup_model');

        if (isset($_SESSION['unreg_email']) && isset($_POST['email'])) {
            if ($signup_model->getOTPCode($_POST['email'])) {

                $otpCode = $signup_model->getOTPCode($_POST['email'])['otp_code'];
                if ($_POST['otp-code'] == $otpCode) {

                    $signup_model->insertNewUser($_POST['email']);
                    $signup_model->deleteTempUser($_POST['email']);

                    Flasher::setFlash('Your account has been verivied', 'success');
                    header('Location: ' . BASEURL . '/login');
                } else {
                    Flasher::setFlash('OTP Code is wrong', 'error');
                    header('Location: ' . BASEURL . '/signup/verify');
                }
            } else {
                Flasher::setFlash('OTP Code has expired, send another one', 'error');
                header('Location: ' . BASEURL . '/signup/verify');
            }
        } else {
            header('Location: ' . BASEURL . '/signup');
        }
        exit;
    }

    public function sendnewcode() {
        $signup_model = $this->model('Signup_model');

        if (isset($_SESSION['unreg_email']) && !$signup_model->getOTPCode($_SESSION['unreg_email'])) {

            $signup_model->sendOTPCode($_POST['email'], $_POST['otp-code']);
            Flasher::setFlash('OTP Code has been sent to your email', 'success');

            $signup_model->saveTempUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['otp-code']);

            $signup_model->delAfterReq($_POST['email']);

            $_SESSION['unreg_email'] = $_POST['email'];
            $_SESSION['unreg_username'] = $_POST['username'];
            $_SESSION['unreg_password'] = $_POST['password'];
        } else {
            Flasher::setFlash('Wait for 2 minutes after you requested for a new otp code', 'success');
        }
        header('Location: ' . BASEURL . '/signup/verify');
        exit;
    }
}