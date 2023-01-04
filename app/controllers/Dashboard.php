<?php

class Dashboard extends Controller {

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

    public function user($page = null, $index = 1) {
        if ($page == "asesor" || $page == "asesi") {
            $data['page-title'] = 'list ' . $page;
            $this->view("templates/header", $data);
            $this->view('templates/navbar/dashboard-navbar');

            $data["page"] = $this->breadcrumbs;

            $data['user-type'] = $page;
            $this->view('templates/breadcrumbs', $data);

            $data['list-user'] = $this->model('User_model')->fetchAllUser($page, $index - 1);
            $data["page"] = $index;
            $this->view('dashboard/manage_user/list', $data);

            $this->view('templates/footer');
        } else if ($page == "detail") {
            $data['page-title'] = 'User Detail';
            $this->view("templates/header", $data);

            $data["page"] = $this->breadcrumbs;
            array_push($data["page"]["name"], "user");
            array_push($data["page"]["link"], "dashboard/user");

            $this->view('templates/breadcrumbs', $data);

            $data['user-type'] = $page;
            $data['list-user'] = $this->model('User_model')->fetchSingleUser($page, $index);
            $data["page"] = $index;
            $this->view('dashboard/manage_user/detail', $data);

            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
}