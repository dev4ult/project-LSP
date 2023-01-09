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

            // $data['page'] = $this->breadcrumbs;
            // $this->view('templates/breadcrumbs', $data);

            $data['list-skema'] = $this->model('Skema_model')->fetchAllSchema("aktif", $page);
           
            $data['page'] = $page;
            $this->view('list_skema_asesi/index', $data);

            $this->view('templates/footer');
        }

        public function detail_skema($id){

            $data['page-title'] = 'Detail Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            // $data['page'] = $this->breadcrumbs;    
            // $this->view('templates/breadcrumbs', $data);

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

            $data['list-skema'] = $this->model('Skema_model')->searchSkema();
           
            $data['page'] = $page;

            if ($this->model('Skema_model')->searchSkema() == NULL){
                Flasher::setFlash('Data Tidak Ada', 'shadow');
            }

            $this->view('list_skema_asesi/index', $data);
            $this->view('templates/footer');

        }

        public function upload_document(){

            $data['page-title'] = 'Upload Dokumen Skema';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            // if(){
            //     Flasher::setFlash('Maaf, Anda belum mengunggah Dokumen Pokok !', 'danger');
            // }

            $this->view('form_upload_dokumen/index');
            $this->view('templates/footer');

        }

        public function form_upload_document(){

            $data['page-title'] = 'Form Upload Dokumen';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');

            $data['syarat'] = $this->model('Dokumen_model')->fetchAllListPersyaratan();

            $this->view('form_upload_dokumen/form_upload', $data);

            $this->view('templates/footer');

        }

        public function tambah(){
            if($this->model('Dokumen_model')->uploadFile($_POST) > 0){

            } else {
                
            }
        }
    }