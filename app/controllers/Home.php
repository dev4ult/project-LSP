<?php

class Home extends Controller {
    public function index() {
        $data['page-title'] = "Homepage";
        $data['username'] = $this->model("Home_model")->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}