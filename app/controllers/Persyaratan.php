<?php
class Persyaratan extends Controller
{
  public function index()
  {
    $data['page-title'] = "Persyaratan";
    // $data['skkni'] = $this->model("Skema_model")->fetchAllSKKNI();
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('persyaratan/create', $data);
    $this->view('templates/footer');
  }

  public function add()
  {
    if ($this->model("Skema_model")->addData($_POST) > 0) {
      header('Location: ' . BASEURL . '/persyaratan');
    } else {
      header('Location: ' . BASEURL . '/persyaratan');
    }
  }

  public function skema($nama = "", $level = "")
  {
    $data['page-title'] = "Persyaratan";
    $data['list-skema'] = $this->model("Persyaratan_model")->fetchSkema();
    $data['list-persyaratan-umum'] = $this->model("Persyaratan_model")->fetchAllPersyaratan("Umum");
    $data['list-persyaratan-teknis'] = $this->model("Persyaratan_model")->fetchAllPersyaratan("Teknis");
    if ($nama != "") {
      $data['skema-selected'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $nama);
      $data['list-level'] = $this->model("Persyaratan_model")->fetchLevelBySkema($data['skema-selected']);
      if ($level != "") {
        $data['level-selected'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $level);
        $data['persyaratan-skema'] = $this->model("Persyaratan_model")->fetchPersyaratanBySkema($data['skema-selected'], $data['level-selected']);
      }
    }

    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('persyaratan/skema', $data);
    $this->view('templates/footer');
  }

  public function addPersyaratanSkema()
  {
    $finish = "";
    $namaSkema = htmlspecialchars($_POST['skema']);
    $kkni = htmlspecialchars($_POST['level-kkni']);
    $idSkema = $this->model("Persyaratan_model")->getIdSkemaByNama($namaSkema, $kkni)['id'];
    foreach ($_POST['check'] as $chk) {
      $finish = $this->model("Persyaratan_model")->addDataPersyaratanSkema($idSkema, $chk);
    }
    if ($finish) {
      header('Location: ' . BASEURL . '/persyaratan/skema');
    } else {
      header('Location: ' . BASEURL . '/persyaratan/skema');
    }
  }
}
