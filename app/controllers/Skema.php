<?php
class Skema extends Controller
{
  public function index($page = 1)
  {
    $data['page-title'] = "Homepage";
    $data['username'] = 'test';
    $data['page'] = $page;
    $data["list-skema"] = $this->model("Skema_model")->fetchAllSkema("Aktif", $page);
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/index', $data);
    $this->view('templates/footer');
  }
}
