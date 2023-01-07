<?php
class Skema extends Controller
{
  public function index($page = 1)
  {
    $data['page-title'] = "Skema";
    $data['username'] = 'test';
    $data['page'] = $page;
    $data["list-skema"] = $this->model("Skema_model")->fetchAllSkema($page);
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/index', $data);
    $this->view('templates/footer');
  }

  public function add()
  {
    if ($this->model("Skema_model")->addSkema($_POST) > 0) {
      header('Location: ' . BASEURL . '/skema/index');
    } else {
      Flasher::setFlash("Harap isi dengan benar", 'warning');
      header('Location: ' . BASEURL . '/skema/create');
    }
  }

  public function create()
  {
    $data['page-title'] = "Skema";
    $data['skkni'] = $this->model("Skema_model")->fetchAllSKKNI();
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/create', $data);
    $this->view('templates/footer');
  }

  public function status($id, $status)
  {
    $newStatus = $status == "Aktif" ? "Nonaktif" : "Aktif";
    if ($this->model("Skema_model")->updateStatus($id, $newStatus) > 0) {
      header('Location: ' . BASEURL . '/skema/index');
    } else {
      Flasher::setFlash("Harap isi dengan benar", 'warning');
      header('Location: ' . BASEURL . '/skema/index');
    }
  }

  public function update($id)
  {
    if ($this->model("Skema_model")->updateSkema($id, $_POST) > 0) {
      header('Location: ' . BASEURL . '/skema/index');
    } else {
      Flasher::setFlash("Harap isi dengan benar", 'warning');
      header('Location: ' . BASEURL . '/skema/index');
    }
  }

  public function detail($id)
  {
    $data['page-title'] = "Skema";
    $data["data-skema"] = $this->model("Skema_model")->getSingleSkema($id);
    $data["skkni"] = $this->model("Skema_model")->fetchAllSKKNI();
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/edit', $data);
    $this->view('templates/footer');
  }
}
