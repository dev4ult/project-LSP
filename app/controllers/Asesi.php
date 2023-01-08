<?php

    class Asesi extends Controller {

        public function list_skema($page = 1){

            $data['page-title'] = 'Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/dashboard-navbar');
            
            $data['list-skema'] = $this->model('Skema_model')->fetchAllSchema("aktif", $page);
           
            $data['page'] = $page;
            $this->view('list_skema_asesi/index', $data);

            $this->view('templates/footer');
        }

        public function detail_skema($id){

            $data['page-title'] = 'Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/dashboard-navbar');

            $data['skema'] = $this->model('Skema_model')->getSkemaById($id);
            $data['list-persyaratan'] = $this->model('Skema_model')->getDataSkemaById($id, "persyaratan_skema");
            $data['list-unit'] = $this->model('Skema_model')->getDataSkemaById($id, "unit_kompetensi");

            $this->view('list_skema_asesi/detail_skema', $data);
            
            $this->view('templates/footer');

        }

        public function search_skema($page = 1){

            $data['page-title'] = 'Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/dashboard-navbar');

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
            $this->view('templates/navbar/dashboard-navbar');

            // if(){
            //     Flasher::setFlash('Maaf, Anda belum mengunggah Dokumen Pokok !', 'danger');
            // }

            $this->view('form_upload_dokumen/index');
            $this->view('templates/footer');
        }
    }