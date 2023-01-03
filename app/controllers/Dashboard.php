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

                $this->view('templates/navbar/dashboard-navbar');

                $data['username'] = $_SESSION['username'];
                $this->view('dashboard/index', $data);

                $this->view('templates/footer');
            } else {
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        }
    }

    public function list_user($type = null, $page = 1) {
        if ($type == "asesor" || $type == "asesi") {
            $data['page-title'] = 'list ' . $type;
            $this->view("templates/header", $data);
            $this->view('templates/navbar/dashboard-navbar');

            $data["page"] = [
                "name" => [
                    "home",
                    "dashboard"
                ],
                "link" => [
                    "home",
                    "dashboard"
                ]
            ];

            $data['user-type'] = $type;
            $this->view('templates/breadcrumbs', $data);

            $data['list-user'] = $this->model('User_model')->fetchAllUser("biodata_" . $type, $page - 1);
            $data["page"] = $page;
            $this->view('dashboard/list_user', $data);

            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
}