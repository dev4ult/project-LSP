<?php
class Persyaratan extends Controller {
  private $breadcrumbs;
  public function __construct() {
    $this->breadcrumbs = [
      "name" => [
        "Dashboard"
      ],
      "link" => [
        "dashboard"
      ]
    ];
  }

  public function index() {
    $this->model('User_model')->checkUserLogin("admin");

    $data['page-title'] = "List Persyaratan";
    $this->view('templates/header', $data);

    $this->view('templates/sidebar');
    $data['list-persyaratan'] = $this->model("Persyaratan_model")->fetchAllSyarat();
    $data['page-link'] = $this->breadcrumbs;

    $this->view('persyaratan/index', $data);
    $this->view('templates/close_html_tag');
  }

  public function add() {
    $this->model('User_model')->checkUserLogin("admin");

    if ($this->model("Persyaratan_model")->addData($_POST) > 0) {
      Flasher::setFlash("Berhasil menambahkan persyaratan baru", "success");
    }

    header('Location: ' . BASEURL . '/persyaratan');
    exit;
  }

  public function skema($nama = "", $level = "") {
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

  public function addPersyaratanSkema() {
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

  public function edit($id = null) {
    if ($id == null) {
      header('Location: ' . BASEURL . '/persyaratan');
      exit;
    }

    $data['page-title'] = "Ubah Persyaratan";

    $data['persyaratan'] = $this->model("Persyaratan_model")->getSyaratById($id);
    $data['persyaratan-id'] = $id;

    $data['deskripsi'] = $data['persyaratan']['deskripsi'];
    $data['kategori'] = $data['persyaratan']['kategori'];


    $data['page-link'] = $this->breadcrumbs;
    array_push($data["page-link"]["name"], "List Persyaratan");
    array_push($data["page-link"]["link"], "persyaratan");

    $this->view('templates/header', $data);
    $this->view('templates/sidebar');
    $this->view('persyaratan/update', $data);
    $this->view('templates/close_html_tag');
  }

  public function update($id = null) {
    if ($id == null) {
      header('Location: ' . BASEURL . '/persyaratan');
      exit;
    }

    if ($this->model("Persyaratan_model")->updatePersyaratanById($id, $_POST) > 0) {
      Flasher::setFlash("Persyaratan berhasil diubah", "success");
    }

    header('Location: ' . BASEURL . '/persyaratan');
    exit;
  }

  public function delete($id = null) {
    if ($id == null) {
      header('Location: ' . BASEURL . '/persyaratan');
      exit;
    }

    if ($this->model("Persyaratan_model")->deletePersyaratanById($id) > 0) {
      Flasher::setFlash("Persyaratan berhasil dihapus", "success");
    }
    header('Location: ' . BASEURL . '/persyaratan');
    exit;
  }
}