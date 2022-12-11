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
        header('Location: ' . BASEURL . '/signup');
        if ($this->model('User_model')->addNewUser($_POST) > 0) {
            Flasher::setFlash('Succesfully requested for a new account', 'success');
        }
        exit;
    }
}