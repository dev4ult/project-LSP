<?php

class Dashboard extends Controller {
    public function index() {
        $data['page-title'] = 'Dashboard page';
        $this->view('templates/header');
        $this->view('templates/navbar/main-navbar');
        $this->view('templates/footer');
    }
}