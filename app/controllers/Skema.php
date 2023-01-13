<?php
class Skema extends Controller
{
  public function index($page = 1)
  {
    $data['page-title'] = "Skema";
    $data['username'] = 'test';
    $data['page'] = $page;
    if (isset($_POST['keyword'])) {
      $data["list-skema"] = $this->model("Skema_model")->searchDataSkema($page, $_POST['keyword']);
    } else {
      $data["list-skema"] = $this->model("Skema_model")->fetchAllSkemaPagination($page);
      // var_dump($data['list-skema']);
      // die;
    }
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
      header('Location: ' . BASEURL . '/skema/create');
    }
  }

  public function create()
  {
    $data['page-title'] = "Skema";
    $data['skkni'] = $this->model("Skema_model")->fetchAllSKKNI();
    $data['jurusan'] = $this->model("Skema_model")->fetchAllJurusan();
    $data['asesor'] = $this->model("Skema_model")->fetchAllAsesor();
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

  public function update($idSkema)
  {
    // $nama = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $nama);
    // $level = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $level);
    // $idSkema = $this->model("Persyaratan_model")->getIdSkemaByNama($nama, $level)['id'];
    $level = $this->model("Skema_model")->getSingleSkema($idSkema)['level'];
    $syaratExisting = [];
    $tempCheck = [];
    foreach ($this->model("Persyaratan_model")->fetchPersyaratanBySkema($idSkema) as $se) {
      $syaratExisting[] = $se['deskripsi'];
    }

    if (isset($_POST['check'])) {
      $tempCheck = $_POST['check'];
    }
    if (count($tempCheck) > 0) {
      $resultForAdd = array_diff($tempCheck, $syaratExisting);
      foreach ($resultForAdd as $add) {
        $this->model("Persyaratan_model")->addDataPersyaratanSkema($idSkema, $add);
      }
    }
    if (isset($tempCheck)) {
      $resultForDelete = array_diff($syaratExisting, $tempCheck);
      foreach ($resultForDelete as $delete) {
        $this->model("Persyaratan_model")->deleteDataPersyaratanSkema($delete, $idSkema);
      }
    }
    // var_dump($tempCheck);
    // die;
    if ($this->model("Skema_model")->updateSkema($idSkema, $_POST) > 0 || $_POST['level'] == $level) {
      header('Location: ' . BASEURL . '/skema/index');
    } else {
      Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
      header('Location: ' . BASEURL . '/skema/detail/' . $idSkema);
    }
  }

  public function detail($idSkema)
  {
    $data['page-title'] = "Skema";
    $data['id-skema'] = $idSkema;
    $data['list-level'] = $this->model("Persyaratan_model")->fetchLevelBySkema($idSkema);
    $data['persyaratan-skema'] = $this->model("Persyaratan_model")->fetchPersyaratanBySkema($idSkema);
    // if ($nama != "") {
    //   $data['skema-selected'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $nama);
    //   if ($level != "") {
    //     $data['level-selected'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $level);
    //   }
    // }
    $data["data-skema"] = $this->model("Skema_model")->getSingleSkema($idSkema);
    $data['list-persyaratan-umum'] = $this->model("Persyaratan_model")->fetchAllPersyaratan("Umum");
    $data['list-persyaratan-teknis'] = $this->model("Persyaratan_model")->fetchAllPersyaratan("Teknis");
    $data["skkni"] = $this->model("Skema_model")->fetchAllSKKNI();
    $data['jurusan'] = $this->model("Skema_model")->fetchAllJurusan();
    $data['asesor'] = $this->model("Skema_model")->fetchAllAsesor();

    // $idSkema = $this->model("Persyaratan_model")->getIdSkemaByNama($data['skema-selected'], $data['level-selected'])['id'];
    $data['list-kompetensi'] = $this->model("Skema_model")->getKompetensiByIdSkema($idSkema);
    $data['list-asesi'] = $this->model("Skema_model")->fetchAllAsesiBySkema($idSkema);

    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/edit', $data);
    $this->view('templates/footer');
  }

  public function getSyaratSkema()
  {
    $nama = $_POST['skema'];
    $level = $_POST['level'];
    $syaratExisting = [];
    $data['skema-selected'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $nama);
    $data['list-level'] = $this->model("Persyaratan_model")->fetchLevelBySkema($data['skema-selected']);
    $data['level-selected'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $level);
    $idSkema = $this->model("Persyaratan_model")->getIdSkemaByNama($nama, $level)['id'];
    $dataPersyaratan[] = $this->model("Persyaratan_model")->fetchAllPersyaratanByIdSkemaKategori($idSkema, "Umum");
    $dataPersyaratan[] = $this->model("Persyaratan_model")->fetchAllPersyaratanByIdSkemaKategori($idSkema, "Teknis");
    echo json_encode($dataPersyaratan);
  }

  // Unit Kompetensi
  public function asesmen($page = 1)
  {
    $data['page-title'] = "Asesmen";
    $data['username'] = 'test';
    $data['page'] = $page;
    if (isset($_POST['keyword'])) {
      $data["list-kompetensi"] = $this->model("Skema_model")->searchDataUnitKompetensi($page, $_POST['keyword']);
    } else {
      $data["list-kompetensi"] = $this->model("Skema_model")->fetchAllUnitKompetensi($page);
    }
    // var_dump($data['list-kompetensi']);
    // die;
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/asesmen', $data);
    $this->view('templates/footer');
  }

  public function tambah_kompetensi($idSkema)
  {
    $data['page-title'] = "Skema";
    $data['id-skema'] = $idSkema;
    // $data['nama-skema'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $nama);
    // $data['level-skema'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $level);
    if (isset($_POST['tambah'])) {
      // $idSkema = $this->model("Persyaratan_model")->getIdSkemaByNama($data['nama-skema'], $data['level-skema'])['id'];
      $nama_skema = $this->model("Skema_model")->getSingleSkema($idSkema)['nama_skema'];
      $level = $this->model("Skema_model")->getSingleSkema($idSkema)['level'];
      if ($_FILES['soal-kompetensi']['error'] !== 4) {
        $_POST['soal-kompetensi'] = $this->checkExtensionOfFile($nama_skema, $level, BASEURL . '/skema/tambah_kompetensi/' . $data['id-skema']);
        if (!$_POST['soal-kompetensi']) {
          $_POST['soal-kompetensi'] = $data['list-kompetensi']['file_opsional'];
          header('Location: ' . BASEURL . '/skema/tambah_kompetensi/' . $data['id-skema']);
          return;
        }
      }
      if ($this->model("Skema_model")->addKompetensi($idSkema, $_POST) > 0) {
        header('Location: ' . BASEURL . '/skema/detail/' . $data['id-skema']);
      } else {
        Flasher::setFlash("Nama kompetensi sudah ada", 'warning');
        header('Location: ' . BASEURL . '/skema/tambah_kompetensi/' . $data['id-skema']);
      }
    } else {
      $this->view('templates/header', $data);
      $this->view('templates/navbar/main-navbar');
      $this->view('kompetensi/tambah', $data);
      $this->view('templates/footer');
    }
  }

  public function edit_kompetensi($id, $idSkema)
  {
    $data['page-title'] = "Skema";
    $data['id-kompetensi'] = $id;
    $data['id-skema'] = $idSkema;
    // $data['nama-skema'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $nama);
    // $data['level-skema'] = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $level);
    $data['list-kompetensi'] = $this->model("Skema_model")->getKompetensiByIdKompetensi($id);
    if (isset($_POST['ubah'])) {
      $nama_skema = $this->model("Skema_model")->getSingleSkema($idSkema)['nama_skema'];
      $level = $this->model("Skema_model")->getSingleSkema($idSkema)['level'];
      if ($_FILES['soal-kompetensi']['error'] !== 4) {
        $_POST['soal-kompetensi'] = $this->checkExtensionOfFile($nama_skema, $level, BASEURL . '/skema/edit_kompetensi/' . $id . '/' . $data['id-skema']);
        // var_dump($_POST['soal-kompetensi']);
        // die;
        if (!$_POST['soal-kompetensi']) {
          $_POST['soal-kompetensi'] = $data['list-kompetensi']['file_opsional'];
          header('Location: ' . BASEURL . '/skema/edit_kompetensi/' . $id . '/' . $data['id-skema']);
          return;
        }
      } else {
        $_POST['soal-kompetensi'] = $data['list-kompetensi']['file_opsional'];
      }
      // var_dump($_POST);
      // die;
      if ($this->model("Skema_model")->updateKompetensi($id, $_POST) > 0 || $_POST['nama-kompetensi'] == $data['list-kompetensi']['nama_kompetensi']) {
        header('Location: ' . BASEURL . '/skema/detail/' . $data['id-skema']);
      } else {
        Flasher::setFlash("Nama kompetensi sudah ada", 'warning');
        header('Location: ' . BASEURL . '/skema/edit_kompetensi/' . $id . '/' . $data['id-skema']);
      }
    } else {
      $this->view('templates/header', $data);
      $this->view('templates/navbar/main-navbar');
      $this->view('kompetensi/ubah', $data);
      $this->view('templates/footer');
    }
  }

  private function checkExtensionOfFile($nama, $level, $url)
  {
    $namaFile = $_FILES['soal-kompetensi']['name'];
    $ukuranFile = $_FILES['soal-kompetensi']['size'];
    $error = $_FILES['soal-kompetensi']['error'];
    $tmpName = $_FILES['soal-kompetensi']['tmp_name'];

    // Cek ekstensi file yang dikirimkan
    $ekstensiGambarValid = ['pdf'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      Flasher::setFlash("HMM, Kamu salah upload file", 'warning');
      return false;
    }

    // Cek ukuran file
    if ($ukuranFile > 3000000) {
      Flasher::setFlash("Ukuran File Tidak Boleh Lebih dari 3 MB", 'warning');
      return false;
    }

    // Ubah Nama File
    $namaFileBaru = $nama . '-' . $level . '_';
    $namaFileBaru .= uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // Pindahkan file ke dalam direktori yang diinginkan
    $dirpath = BASEURL;
    $dirpath .= '\/soal-asesmen\/';
    // move_uploaded_file($tmpName, $dirpath . $namaFileBaru);

    // var_dump($namaFileBaru);
    // die;
    return $namaFileBaru;
  }

  public function hapus_kompetensi($id, $idSkema)
  {
    // $nama = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $nama);
    // $level = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $level);
    if ($this->model("Skema_model")->deleteKompetensiById($id) > 0) {
      header('Location: ' . BASEURL . "/skema/detail/$idSkema");
    } else {
      Flasher::setFlash("Ada yg salah dari hapusnya", 'warning');
      header('Location: ' . BASEURL . "/skema/detail/$idSkema");
    }
  }

  public function countRegistered($id)
  {
    return $this->model("Skema_model")->countAsesiRegistered($id);
  }

  public function countAssessed($id)
  {
    return $this->model("Skema_model")->countAsesiAssessed($id);
  }

  public function countPersyaratan($id)
  {
    return $this->model("Persyaratan_model")->countPersyaratanByID($id);
  }

  public function countKompetensi($id)
  {
    return $this->model("Skema_model")->countKompetensiByID($id);
  }


  public function lastCreated()
  {
    $data['page-title'] = "Skema";
    $data['username'] = 'test';
    // $data['page'] = $page;
    $data["list-skema"] = $this->model("Skema_model")->lastCreated5();
    $this->view('templates/header', $data);
    $this->view('templates/navbar/main-navbar');
    $this->view('skema/last', $data);
    $this->view('templates/footer');
  }
}
