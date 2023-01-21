<?php

class Asesi extends Controller {
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

    public function list_skema($page = 1) {

        $data['page-title'] = 'Skema Sertifikasi';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');

        $data['list-skema'] = $this->model('Skema_model')->fetchAllSchema("aktif", $page);

        $data['page'] = $page;
        $this->view('list_skema_asesi/index', $data);

        $this->view('templates/footer');
    }

    public function detail_skema($id) {

        $data['page-title'] = 'Detail Skema Sertifikasi';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');

        $data['skema'] = $this->model('Skema_model')->getSkemaById($id);
        $data['list-persyaratan'] = $this->model('Skema_model')->getDataSkemaById($id, "persyaratan_skema");
        $data['list-unit'] = $this->model('Skema_model')->getDataSkemaById($id, "unit_kompetensi");

        $this->view('list_skema_asesi/detail_skema', $data);

        $this->view('templates/footer');
    }

    public function search_skema($page = 1) {

        $data['page-title'] = 'Skema Sertifikasi';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');

        $data['list-skema'] = $this->model('Skema_model')->searchSkema($page);
        $data['page'] = $page;

        if ($this->model('Skema_model')->searchSkema($page) == NULL) {
            Flasher::setFlash('Data Tidak Ada', 'error');
        }

        $this->view('list_skema_asesi/index', $data);
        $this->view('templates/close_html_tag');
    }

    public function upload_document() {

        $data['page-title'] = 'List Status Unggah';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');

        $data['page-link'] = $this->breadcrumbs;

        $data['user-type'] = $_SESSION['username'];

        $id_bio = $this->model("User_model")->getIdBioByUsername("asesi", $data['user-type']);


        $data['skema-asesi'] = $this->model('Skema_model')->getSkemaAsesi($id_bio);

        $this->view('form_upload_dokumen/index', $data);
        $this->view('templates/close_html_tag');
    }

    public function search_upload_document($page = 1) {

        $data['page-title'] = 'Upload Dokumen Skema';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');

        $data['skema-asesi'] = $this->model('Skema_model')->searchSkemaAsesi($page);
        $data['count'] = $this->model('Skema_model')->getTotalUpload();
        $data['page'] = $page;

        if ($this->model('Skema_model')->searchSkemaAsesi($page) == NULL) {
            Flasher::setFlash('Data Tidak Ada', 'error');
        }

        $this->view('form_upload_dokumen/index', $data);
        $this->view('templates/footer');
    }

    public function form_upload_document($idSkema = null) {

        if ($idSkema == null || $this->model("Skema_model")->isSkemaExist($idSkema) == 0) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        $data['id-skema'] = $idSkema;

        $data['page-title'] = 'Unggah Dokumen';

        $data['page-link'] = $this->breadcrumbs;
        array_push($data['page-link']['name'], 'List Status Unggah');
        array_push($data['page-link']['link'], 'asesi/upload_document');

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');

        $data['syarat'] = $this->model('Dokumen_model')->fetchAllListPersyaratanOfSkema($idSkema);
        $data['dokumen-syarat'] = $this->model('Dokumen_model')->getPersyaratan();

        $this->view('form_upload_dokumen/form_upload', $data);
        $this->view('templates/close_html_tag');
    }

    public function jadwal_asesmen($page = 1) {

        $data['page-title'] = 'Jadwal Asesmen';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');

        $data['page-link'] = $this->breadcrumbs;

        $data['jadwal'] = $this->model('Skema_model')->getScheduleSkema($page);
        $data['page-total'] = ceil($this->model("Skema_model")->getTotalAsesmenOfAsesi() / 5);
        $data['page'] = $page;

        $this->view('jadwal_skema_asesi/index', $data);
        $this->view('templates/close_html_tag');
    }

    public function search_jadwal_asesmen($page = 1) {

        $data['page-title'] = 'Upload Dokumen Skema';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');

        $data['jadwal'] = $this->model('Skema_model')->searchJadwal($page);
        $data['page'] = $page;

        if ($this->model('Skema_model')->searchJadwal($page) == NULL) {
            Flasher::setFlash('Data Tidak Ada', 'shadow');
        }

        $this->view('jadwal_skema_asesi/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        $this->model("User_model")->checkUserLogin("asesi");

        if ($this->model('Dokumen_model')->uploadFile($_POST) > 0) {
            Flasher::setFlash("Dokumen berhasil diunggah", "success");
        }

        header('Location: ' . BASEURL . '/asesi/form_upload_document/' . $_POST['id-skema']);
        exit;
    }

    public function hapus($idPersyaratan = null) {
        $this->model("User_model")->checkUserLogin("asesi");

        if ($idPersyaratan == null && !$this->model('Dokumen_model')->isDocumentExist($idPersyaratan)) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        if ($this->model('Dokumen_model')->deleteFile($idPersyaratan) > 0) {
            Flasher::setFlash("Dokumen Berhasil Dihapus", "success");
        }
        header('Location: ' . BASEURL . '/asesi/form_upload_document/' . $_POST['id-skema']);
        exit;
    }

    public function daftar($idSkema = null) {
        $this->model("User_model")->checkUserLogin("asesi");

        $id_bio = $this->model("User_model")->getIdBioByUsername("asesi", $_SESSION['username']);

        if ($idSkema == null || $this->model("Skema_model")->isSkemaExist($idSkema) == 0 || $this->model("User_model")->getIdJurusanOfAsesi($id_bio) != $this->model("Skema_model")->getSingleSkema($idSkema)['id_jurusan']) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        if ($this->model('Skema_model')->checkRegistSkema($idSkema) > 0) {
            Flasher::setFlash("Anda telah terdaftar pada skema ini", "error");
        } else if ($this->model('Skema_model')->registSkema($idSkema) > 0) {
            Flasher::setFlash("Anda berhasil mendaftar di skema sertifikasi ini", "success");
        }

        header('Location: ' . BASEURL . '/skema/detail/' . $idSkema);
        exit;
    }

    public function form_upload_ujian($id_unit = null) {
        $this->model("User_model")->checkUserLogin("asesi");

        if ($id_unit == null || !$this->model('Unit_kompetensi_model')->isAsesmenExist((int)$id_unit)) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        $data['page-title'] = 'Unggah Jawaban';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');

        $data['page-link'] = $this->breadcrumbs;
        array_push($data['page-link']['name'], 'Jadwal Asesmen');
        array_push($data['page-link']['link'], 'asesi/jadwal_asesmen');

        $data['unit-kompetensi'] = $this->model('Unit_kompetensi_model')->getUnitKompetensiByid($id_unit);


        $this->view('jadwal_skema_asesi/unit_kompetensi', $data);
        $this->view('templates/close_html_tag');
    }

    public function input_ujian($id_unit = null) {
        $this->model("User_model")->checkUserLogin("asesi");

        if ($id_unit == null || !$this->model('Unit_kompetensi_model')->isAsesmenExist($id_unit)) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        if ($this->model('Unit_kompetensi_model')->uploadUnitKom($_POST, $id_unit) > 0) {
            Flasher::setFlash("Berhasil unggah jawaban", "success");
            header('Location: ' . BASEURL . '/asesi/jadwal_asesmen');
        } else {
            header('Location: ' . BASEURL . '/asesi/form_upload_ujian/' . $id_unit);
        }
        exit;
    }

    public function sertifikat_asesi($page = 1) {
        $this->model("User_model")->checkUserLogin("asesi");

        $data['page-title'] = 'Terbit Sertifikat';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');

        $data['page-link'] = $this->breadcrumbs;

        $data['skema-asesi'] = $this->model('Skema_model')->getSkemaAsesi($page);
        $data['page'] = $page;

        $this->view('sertifikasi/index', $data);
        $this->view('templates/close_html_tag');
    }

    public function search_sertif_skema($page = 1) {

        $data['page-title'] = 'Sertifikasi Skema';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/main-navbar');

        $data['skema-asesi'] = $this->model('Sertifikat_model')->searchSertifikat($page);
        $data['page'] = $page;

        if ($this->model('Sertifikat_model')->searchSertifikat($page) == NULL) {
            Flasher::setFlash('Data Tidak Ada', 'shadow');
        }

        $this->view('Sertifikasi/index', $data);
        $this->view('templates/footer');
    }

    public function download_sertif($id_skema = null) {
        $this->model("User_model")->checkUserLogin("asesi");

        if ($id_skema == null || $this->model("Skema_model")->isSkemaExist($id_skema) == 0) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        $statusLulus = $this->model('Sertifikat_model')->checkLulus($id_skema);

        if ($statusLulus == "Lulus") {
            $data['data-sertif'] = $this->model('Sertifikat_model')->getDataSertifikat($id_skema);
            $this->model('Sertifikat_model')->buildSertifikat($data['data-sertif']);
        } else {
            Flasher::setFlash("Penilaian belum selesai. Memungkinkan ada asesmen yang belum diunggah jawabannya", "warning");
        }

        header('Location: ' . BASEURL . '/asesi/sertifikat_asesi');
        exit;
    }
}