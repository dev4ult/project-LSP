<?php

class Home extends Controller {
    public function index() {
        $data['page-title'] = "Homepage";
        $data['username'] = 'test';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');

        $data['total-asesi'] = $this->model("User_model")->getUserTotal("asesi");
        $data['total-asesor'] = $this->model("User_model")->getUserTotal("asesor");
        $data['total-skema'] = count($this->model("Skema_model")->fetchAllSkema());

        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function profile() {
        $data['page-title'] = "Profil LSP";

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');
        $this->view('home/profile');
        $this->view('templates/footer');
    }
}