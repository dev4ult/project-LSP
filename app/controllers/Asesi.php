<?php

    class Asesi extends Controller {

        public function index(){

            $data['page-title'] = 'Dashboard Asesi LSP';

            $this->view('templates/header', $data);
            $this->view('templates/navbar/dashboard-navbar');

            $this->view('dashboard/asesi/index');
            $this->view('templates/footer');
            
        }

    }