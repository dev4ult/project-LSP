<?php

class Registration extends Controller {
    public function index() {
        $data['page-title'] = "Registration Page";

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');
        $this->view('registration/index');
        $this->view('templates/footer');
    }
}