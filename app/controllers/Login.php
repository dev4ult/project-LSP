<?php

class Login extends Controller {
    public function index() {
        $data['page-title'] = "Login";

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');
        $this->view('login/index');
        $this->view('templates/close_html_tag');
    }

    public function validate() {
        if ($this->model('Login_model')->validateLogin($_POST)) {
            header('Location: ' . BASEURL . '/dashboard');
        } else {
            $_SESSION['login'] = false;
            header('Location: ' . BASEURL . '/login');
        }
        exit;
    }
}