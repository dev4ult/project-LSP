<?php

    class Asesi extends Controller {
        private $breadcrumbs;

        public function __construct() {
            $this->breadcrumbs = [
                "name" => [
                    "home",
                    "dashboard"
                ],
                "link" => [
                    "home",
                    "dashboard"
                ]
            ];
        }

        public function list_skema($page = 1){

            $data['page-title'] = 'Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['list-skema'] = $this->model('Skema_model')->fetchAllSchema("aktif", $page);
           
            $data['page'] = $page;
            $this->view('list_skema_asesi/index', $data);

            $this->view('templates/footer');
        }

        public function detail_skema($id){

            $data['page-title'] = 'Detail Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['skema'] = $this->model('Skema_model')->getSkemaById($id);
            $data['list-persyaratan'] = $this->model('Skema_model')->getDataSkemaById($id, "persyaratan_skema");
            $data['list-unit'] = $this->model('Skema_model')->getDataSkemaById($id, "unit_kompetensi");

            $this->view('list_skema_asesi/detail_skema', $data);
            
            $this->view('templates/footer');

        }

        public function search_skema($page = 1){

            $data['page-title'] = 'Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['list-skema'] = $this->model('Skema_model')->searchSkema($page);
            $data['page'] = $page;

            if ($this->model('Skema_model')->searchSkema($page) == NULL){
                Flasher::setFlash('Data Tidak Ada', 'shadow');
            }

            $this->view('list_skema_asesi/index', $data);
            $this->view('templates/footer');

        }

        public function upload_document($page = 1){

            $data['page-title'] = 'Upload Dokumen Skema';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['skema-asesi'] = $this->model('Skema_model')->getSkemaAsesi($page);
            $data['count'] = $this->model('Skema_model')->getTotalUpload();
            $data['page'] = $page;

            $this->view('form_upload_dokumen/index', $data);
            $this->view('templates/footer');

        }

        public function search_upload_document($page = 1){

            $data['page-title'] = 'Upload Dokumen Skema';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['skema-asesi'] = $this->model('Skema_model')->searchSkemaAsesi($page);
            $data['count'] = $this->model('Skema_model')->getTotalUpload();
            $data['page'] = $page;

            if ($this->model('Skema_model')->searchSkemaAsesi($page) == NULL){
                Flasher::setFlash('Data Tidak Ada', 'shadow');
            }

            $this->view('form_upload_dokumen/index', $data);
            $this->view('templates/footer');

        }

        public function form_upload_document(){

            $data['page-title'] = 'Form Upload Dokumen';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['syarat'] = $this->model('Dokumen_model')->fetchAllListPersyaratan();
            $data['dokumen-syarat'] = $this->model('Dokumen_model')->getPersyaratan();

            $this->view('form_upload_dokumen/form_upload', $data);
            $this->view('templates/footer');

        }

        public function jadwal_asesmen($page = 1){

            $data['page-title'] = 'Jadwal Asesmen Sertifikasi Asesi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['jadwal'] = $this->model('Skema_model')->getScheduleSkema($page);
            $data['page'] = $page;

            $this->view('jadwal_skema_asesi/index', $data);
            $this->view('templates/footer');

        }

        public function search_jadwal_asesmen($page = 1){

            $data['page-title'] = 'Upload Dokumen Skema';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['jadwal'] = $this->model('Skema_model')->searchJadwal($page);
            $data['page'] = $page;

            if ($this->model('Skema_model')->searchJadwal($page) == NULL){
                Flasher::setFlash('Data Tidak Ada', 'shadow');
            }

            $this->view('jadwal_skema_asesi/index', $data);
            $this->view('templates/footer');

        }

        public function tambah(){

            if($this->model('Dokumen_model')->uploadFile($_POST) > 0){
                Flasher::setFlash("Berhasil Ditambahkan");
            } 
            header('Location: '.BASEURL.'/asesi/form_upload_document');
            exit;
        }

        public function hapus($idPersyaratan){
            if($this->model('Dokumen_model')->deleteFile($idPersyaratan) > 0){
                Flasher::setFlash("Berhasil Dihapus");
            }
            header('Location: '.BASEURL.'/asesi/form_upload_document');
            exit;
        }

        public function daftar($idSkema){
            if($this->model('Skema_model')->registSkema($idSkema) > 0){
                header('Location: '.BASEURL.'/asesi/upload_document');
                exit;
            }
        }

        public function form_upload_ujian($idUnit){
            $data['page-title'] = 'Input Unit Kompetensi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['unit-kompetensi'] = $this->model('Unit_kompetensi_model')->getUnitKompetensiByid($idUnit);

            $this->view('jadwal_skema_asesi/unit_kompetensi', $data);
            $this->view('templates/footer');
        }

        public function input_ujian($id){
            if($this->model('Unit_kompetensi_model')->uploadUnitKom($_POST, $id) > 0){
                Flasher::setFlash("Berhasil Upload");
            }
            header('Location: '.BASEURL.'/asesi/form_upload_ujian/'.$id);
            exit;
        }

        public function sertifikat_asesi($page = 1){
            $data['page-title'] = 'Sertifikasi Skema';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['skema-asesi'] = $this->model('Skema_model')->getSkemaAsesi($page);
            $data['page'] = $page;

            $this->view('Sertifikasi/index', $data);
            $this->view('templates/footer');
        }

        public function DownloadSertif($id){

            // $UnitKom = $this->model('Sertifikat_model')->checkUnitKom($id);
            // $TotalUnitKom = $this->model('Sertifikat_model')->getTotalData($id, "unit_kompetensi");
            // if($UnitKom == $TotalUnitKom){
            //     Flasher::setFlash("Berhasil Mendapat sertifikat");
            // } else {
            //     Flasher::setFlash("Kerjakan Semua Unit untuk mendapatkan sertifikat");
            // }

            $statusLulus = $this->model('Sertifikat_model')->checkLulus();

            if ($statusLulus == "Lulus"){
                $data['data-sertif'] = $this->model('Sertifikat_model')->getDataSertifikat($id);
                $this->model('Sertifikat_model')->buildSertifikat($data['data-sertif']);
            } else {
                Flasher::setFlash("Selesaikan Semua Unit Kompetensi untuk mendapatkan sertifikat profesi");
            }

            header('Location: '.BASEURL.'/asesi/sertifikat_asesi');
            exit;
        }
    }