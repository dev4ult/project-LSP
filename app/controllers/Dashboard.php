<?php

class Dashboard extends Controller {
    public function index() {
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
            header('Location: ' . BASEURL . '/login');
            exit;
        } else {
            if ($_SESSION['login']) {

                $data['page-title'] = 'Dashboard page';
                $this->view('templates/header', $data);

                $this->view('templates/navbar/main-navbar');

                $data['username'] = $_SESSION['username'];
                $this->view('dashboard/index', $data);

                $this->view('templates/footer');
            } else {
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        }
    }

    public function cari_course($nama_course = null) {
        if ($nama_course == null) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            $data['s_course'] = $this->model('Course_model')->findCourseByName($nama_course);

            $data['page-title'] = 'Search Course';
            $this->view('templates/header', $data);
            $this->view('templates/navbar/main-navbar');
            $this->view('dashboard/cari_course', $data);
            $this->view('templates/footer');
        }
    }
}
