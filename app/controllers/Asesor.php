<?php
class Asesor extends Controller {
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

  public function info($idSkema, $page = 1) {
    $this->model('User_model')->checkUserLogin("asesor");

    $data['page-title'] = 'Asesor Page';
    $data['page'] = $page;
    $data['id-skema'] = $idSkema;
    require_once '../app/controllers/Skema.php';
    $data['list-skema-asesi'] = $this->model("Asesor_model")->fetchAllAsesiByIDSkema($idSkema, $page);
    $data['list-kompetensi'] = $this->model("Skema_model")->getKompetensiByIdSkema($idSkema);

    $this->view('templates/header', $data);

    $this->view('templates/sidebar');



    $this->view('dashboard/asesor/detail_skema', $data);

    $this->view('templates/footer');
  }

  public function jadwal_asesmen($page = 1) {
    $this->model('User_model')->checkUserLogin("asesor");

    $data['page-title'] = "Jadwal Asesmen";
    $data['page'] = $page;

    $data['total-asesmen'] = 0;
    $data['username'] = $_SESSION['username'];

    foreach ($this->model("Skema_model")->fetchAllSkema() as $skema) {
      if ($skema['username_asesor'] == $data['username']) {
        $data['total-asesmen'] += $this->model("Skema_model")->fetchAllAsesmenByIdSkema($skema['id']);
      }
    }

    if ($data['total-asesmen'] == 0) {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    }

    $data['page-total'] = ceil($data['total-asesmen'] / 5);


    $id_bio = $this->model('User_model')->getIdBioByUsername('asesor', $_SESSION['username']);

    $data['jadwal'] = $this->model('Skema_model')->getScheduleSchemaOfAsesor($page, $id_bio);

    $data['page-link'] = $this->breadcrumbs;

    if ((int)$page > $data['page-total']) {
      header('Location: ' . BASEURL . '/asesor/jadwal_asesmen');
      exit;
    }

    $this->view('templates/header', $data);
    $this->view("templates/sidebar");

    $data['page-controller'] = "asesor/jadwal_asesmen";
    $this->view('skema/asesor/asesmen', $data);
    $this->view('templates/close_html_tag');
  }

  public function penilaian($id_asesi = null, $idSkema = null) {
    $this->model('User_model')->checkUserLogin("asesor");

    if ($id_asesi == null || $idSkema == null || $this->model("Skema_model")->isSkemaExist($idSkema) == 0 || !$this->model("User_model")->isAsesiExist($id_asesi)) {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    }

    $data['page-title'] = 'Penilaian Asesi';

    $data['page-link'] = $this->breadcrumbs;
    array_push($data['page-link']['name'], 'List Skema Sertifikasi');
    array_push($data['page-link']['link'], 'skema/list/asesor');

    array_push($data['page-link']['name'], 'Detail Skema Sertifikasi');
    array_push($data['page-link']['link'], 'skema/detail/' . $idSkema);


    $data['id-skema'] = $idSkema;
    $data['id-asesi'] = $id_asesi;
    $data['list-kompetensi'] = $this->model("Skema_model")->getKompetensiByIdSkema($idSkema);
    $data['list-dokumen-asesi'] = $this->model("Asesor_model")->fetchDokumenAsesi($data['id-asesi']);

    $status = $this->model("Asesi_model")->getStatusAsesmen($idSkema, $id_asesi) == "Sudah" ? true : false;
    if ($status) {
      $data['nilai-asesi'] = $this->model("Asesi_model")->fetchNilaiDokumenAsesi($data['id-asesi']);
    }

    $this->view('templates/header', $data);
    $this->view('templates/sidebar');
    $this->view('dashboard/asesor/penilaian_asesmen', $data);
    $this->view('templates/close_html_tag');
  }

  public function add_penilaian($idSkema = null, $id_asesi = null) {
    $this->model('User_model')->checkUserLogin("asesor");

    if ($id_asesi == null || $idSkema == null || $this->model("Skema_model")->isSkemaExist($idSkema) == 0 || !$this->model("User_model")->isAsesiExist($id_asesi)) {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    }

    $data = [];
    $nilai = [];
    $finish = 0;
    $status = $this->model("Asesi_model")->getStatusAsesmen($idSkema, $id_asesi) == "Sudah" ? true : false;
    $data['list-kompetensi'] = $this->model("Skema_model")->getKompetensiByIdSkema($idSkema);
    for ($i = 0; $i < count($data['list-kompetensi']); $i++) {
      $tempArr = explode('/', $_POST['nilai'][$i]);
      if ($status) {
        $this->model("Asesor_model")->updatePenilaianAsesi($tempArr);
        $finish = 1;
      } else {
        $this->model("Asesor_model")->addPenilaianAsesi($tempArr);
        $finish = 1;
      }
      $tempArr = [];
    }

    if (!$status) {
      $this->model("Asesi_model")->updateStatusKelulusan($id_asesi, $idSkema);
    }

    if ($finish > 0) {
      Flasher::setFlash("Penilaian berhasil diperbaharui", "success");
      header('Location: ' . BASEURL . '/skema/detail/' . $idSkema);
    } else {
      Flasher::setFlash("Ada kesalahan", "warning");
      header('Location: ' . BASEURL . '/asesor/penilaian/' . $id_asesi . '/' . $idSkema);
    }
    exit;
  }

  public function update_status($idAsesi = null, $idSkema = null, $status = null) {
    if ($idAsesi == null || $idSkema == null || $status == null || $this->model("Skema_model")->isSkemaExist($idSkema) == 0 || !$this->model("User_model")->isAsesiExist($idAsesi)) {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    }

    $status = $status == 0 ? "Belum Lulus" : "Lulus";
    if ($this->model("Asesi_model")->updateStatusKelulusan($idAsesi, $idSkema, $status) > 0) {
      Flasher::setFlash("Satu asesi berhasil diubah status kelulusannya", "success");
    } else {
      Flasher::setFlash("Ada kesalahan", "warning");
    }
    header('Location: ' . BASEURL . '/skema/detail/' . $idSkema);
    exit;
  }

  public function countAsesi() {
    return $this->model("Asesor_model")->amountAsesiByAsesor();
  }

  public function countSkema() {
    return $this->model("Asesor_model")->amountSkemaByAsesor();
  }

  public function countKompetensi() {
    return $this->model("Asesor_model")->amountKompetensiByAsesor();
  }

  public function countDokumenAsesmen($id) {
    return $this->model("Asesor_model")->amountAsesmen($id);
  }

  public function countDokumenAsesmenByIdAsesi($id) {
    return $this->model("Asesor_model")->amountAsesmenByAsesi($id);
  }

  public function getStatusAsesmenAsesi($idSkema, $idAsesi) {
    return $this->model("Asesi_model")->getStatusAsesmen($idSkema, $idAsesi);
  }

  public function getNilaiAsesi($idAsesi) {
    return $this->model("Asesi_model")->fetchNilaiDokumenAsesi($idAsesi);
  }
}