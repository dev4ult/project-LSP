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
        if ($this->model('User_model')->addNewUser($_POST) > 0) {
            $this->model('User_model')->sendEmailForVerify($_POST['email'], $_POST['otp-code']);

            Flasher::setFlash('OTP Code has been sent to your email', 'success');
            $this->model('User_model')->delRowInPeriod($_POST['email']);

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
    }

    public function sendnewcode() {
        if (isset($_SESSION['unreg_email']) && !$this->model('User_model')->isAlreadySendRequest($_SESSION['unreg_email'])) {
            $this->model('User_model')->sendEmailForVerify($_POST['email'], $_POST['otp-code']);

            Flasher::setFlash('OTP Code has been sent to your email', 'success');

            $this->model('User_model')->insertNewUnregUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['otp-code']);
            $this->model('User_model')->delRowInPeriod($_POST['email']);

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