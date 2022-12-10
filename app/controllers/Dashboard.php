<?php

class Dashboard extends Controller {
    public function index() {
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
            header('Location: ' . BASEURL . '/login');
            exit;
        } else {
            if ($_SESSION['login']) {

                $data['page-title'] = 'Dashboard page';
                $this->view('templates/header', $data);

                $this->view('templates/navbar/main-navbar');

                $data['username'] = $_SESSION['username'];
                $this->view('dashboard/index', $data);

                $this->view('templates/footer');
            }
        }
    }
}