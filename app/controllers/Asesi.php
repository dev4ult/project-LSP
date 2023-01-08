<?php

    class Asesi extends Controller {

        public function index(){

            $data['page-title'] = 'Dashboard Asesi LSP';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/dashboard-navbar');

            $this->view('dashboard/asesi/index');

            $this->view('templates/footer');
            
        }

        public function list_skema($page = 1){

            $data['page-title'] = 'Skema Sertifikasi';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/dashboard-navbar');
            
            $data['list-skema'] = $this->model('Skema_model')->fetchAllSchema("aktif", $page);
            
            // $data['id'] = $this->model('Skema_model')->getIdData("skema_sertifikasi");

            // foreach ($data['id'] as $dataId) :
            //     $data['persyaratan'] = $this->model('Skema_model')->getTotalData($dataId['id'], "persyaratan_skema");
            // endforeach;
           
            $data['page'] = $page;
            $this->view('list_skema_asesi/index', $data);
            $this->view('templates/footer');

        }
    }