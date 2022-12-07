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
        if ($this->model('User_model')->checkExistEmail($_POST['email']) == false) {
            if ($this->model('User_model')->addNewUser($_POST) > 0) {
                echo "<script>alert('Your request has been sent')</script>";
            }
        } else {
            echo "<script>alert('That email has been sending a new user request')</script>";
        }
        header('Location: ' . BASEURL . '/signup');
        exit;
    }
}