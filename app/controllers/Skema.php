<?php
class Skema extends Controller
{
  public function index($page = 1)
  {
    $data['page-title'] = "Skema";
    $data['username'] = 'test';
    $data['page'] = $page;
    $data["list-skema"] = $this->model("Skema_model")->fetchAllSkema("Aktif", $page);
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/index', $data);
    $this->view('templates/footer');
  }

  public function add()
  {
    $data['page-title'] = "Skema";
    $data['username'] = 'test';
    $data["list-skema"] = $this->model("Skema_model")->fetchAllSkema();
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/create', $data);
    $this->view('templates/footer');
  }

  public function create()
  {
    $data['page-title'] = "Skema";
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/create');
    $this->view('templates/footer');
  }
}
