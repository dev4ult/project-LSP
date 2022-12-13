<?php

class Home extends Controller {
    public function index() {
        $data['page-title'] = "Homepage";
        $data['username'] = 'test';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}