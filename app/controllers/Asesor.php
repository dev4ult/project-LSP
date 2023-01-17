<?php
class Asesor extends Controller {

  public function info($idSkema, $page = 1) {
    // $this->model('User_model')->checkUserLogin("asesor");
    $data['page-title'] = 'Asesor Page';
    $data['page'] = $page;
    $data['id-skema'] = $idSkema;
    // require_once '../app/controllers/Asesor.php';
    require_once '../app/controllers/Skema.php';
    $data['list-skema-asesi'] = $this->model("Asesor_model")->fetchAllAsesiByIDSkema($idSkema, $page);
    $data['list-kompetensi'] = $this->model("Skema_model")->getKompetensiByIdSkema($idSkema);

    $this->view('templates/header', $data);

    $this->view('templates/navbar/dashboard-navbar');

    $this->view('dashboard/asesor/detail_skema', $data);

    $this->view('templates/footer');
  }

  public function penilaian($idAsesi, $idSkema) {
    $data['page-title'] = 'Asesor Page';
    // require_once '../app/controllers/Asesor.php';
    // require_once '../app/controllers/Skema.php';
    // $idSkema = $this->model("Asesor_model")->getSkemaByAsesor()['id'];
    $data['id-skema'] = $idSkema;
    $data['id-asesi'] = $idAsesi;
    $data['list-kompetensi'] = $this->model("Skema_model")->getKompetensiByIdSkema($idSkema);
    $data['list-dokumen-asesi'] = $this->model("Asesor_model")->fetchDokumenAsesi($data['id-asesi']);
    // $status = $this->model("Asesi_model")->getStatusAsesmen($idSkema, $idAsesi);
    $status = $this->model("Asesi_model")->getStatusAsesmen($idSkema, $idAsesi) == "Sudah" ? true : false;
    if ($status) {
      $data['nilai-asesi'] = $this->model("Asesi_model")->fetchNilaiDokumenAsesi($data['id-asesi']);
    }
    // var_dump($data);
    // die;
    $this->view('templates/header', $data);
    $this->view('templates/navbar/dashboard-navbar');
    $this->view('dashboard/asesor/penilaian_asesmen', $data);
    $this->view('templates/footer');
  }

  public function addPenilaian($idSkema, $idAsesi) {
    $data = [];
    $nilai = [];
    $finish = 0;
    $status = $this->model("Asesi_model")->getStatusAsesmen($idSkema, $idAsesi) == "Sudah" ? true : false;
    foreach ($_POST['nilai'] as $p) {
      $data = explode('/', $p);
      $nilaiAsesmen = end($data);
      $nilai[] = $nilaiAsesmen;
      if ($status) {
        $this->model("Asesor_model")->updatePenilaianAsesi($data);
        $finish = 1;
      } else {
        $this->model("Asesor_model")->addPenilaianAsesi($data);
        $finish = 1;
      }
      $data = [];
    }

    if (!$status) {
      $this->model("Asesi_model")->updateStatusKelulusan($idAsesi, $idSkema);
    }

    // foreach ($nilai as $n) {
    //   if ($n == "D") {
    //     $countD++;
    //   }
    // }

    // $status = $countD > 2 ? "Belum Lulus" : "Lulus";
    if ($finish > 0) {
      header('Location: ' . BASEURL . '/asesor/info/' . $idSkema);
    } else {
      Flasher::setFlash("Ada kesalahan", "warning");
      header('Location: ' . BASEURL . '/asesor/penilaian/' . $idAsesi . '/' . $idSkema);
    }
  }

  public function update_status($idAsesi, $idSkema, $status) {
    $status = $status == 0 ? "Belum Lulus" : "Lulus";
    if ($this->model("Asesi_model")->updateStatusKelulusan($idAsesi, $idSkema, $status) > 0) {
      header('Location: ' . BASEURL . '/asesor/info/' . $idSkema);
    } else {
      Flasher::setFlash("Ada kesalahan", "warning");
      header('Location: ' . BASEURL . '/asesor/info/' . $idSkema);
    }
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