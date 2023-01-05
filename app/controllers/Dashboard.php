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
        if (!isset($_SESSION['login']) || !isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
            header('Location: ' . BASEURL . '/login');
        } else {
            header('Location: ' . BASEURL . '/dashboard/' . $_SESSION['user-type']);
        }
        exit;
    }

    public function admin() {
        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            $_SESSION['login'] = false;
            header('Location: ' . BASEURL . '/login');
            exit;
        } else if ($_SESSION['user-type'] == 'admin') {
            $data['page-title'] = 'Dashboard page';
            $this->view('templates/header', $data);

            $this->view('templates/navbar/dashboard-navbar');

            $data['username'] = $_SESSION['username'];
            $this->view('dashboard/admin/index', $data);

            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function user_list($user_type = null, $index = 1) {
        if (($user_type == "asesor" || $user_type == "asesi") && $_SESSION['user-type'] == "admin") {
            $data['page-title'] = 'list ' . $user_type;
            $this->view("templates/header", $data);
            $this->view('templates/navbar/dashboard-navbar');

            $data["page"] = $this->breadcrumbs;
            $data['user-type'] = $user_type;
            $this->view('templates/breadcrumbs', $data);

            $this->view('dashboard/admin/form/add_' . $user_type);
            $data['list-user'] = $this->model('User_model')->fetchAllUser($user_type, $index - 1);
            $data["page"] = $index;
            $this->view('dashboard/admin/list/user', $data);

            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function user_detail($user_type, $user_id) {
        if (($user_type == "asesor" || $user_type == "asesi") && $_SESSION['user-type'] == "admin") {
            $data['page-title'] = 'detail';
            $this->view("templates/header", $data);

            $data["page"] = $this->breadcrumbs;
            array_push($data["page"]["name"], "list " . $user_type);
            array_push($data["page"]["link"], "dashboard/user_list");

            $this->view('templates/breadcrumbs', $data);
            $data['user-type'] = $user_type;

            $data['user'] = $this->model('User_model')->fetchSingleUser($user_type, $user_id);
            $this->view('dashboard/admin/detail/' . $user_type, $data);

            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function bio_update($user_type = null) {
        if ($user_type == "asesor" || $user_type == "asesi") {
            if ($this->model('User_model')->updateBiodata($_POST, $user_type) > 0) {
                Flasher::setFlash('New account has been added', 'success');
            }
            header('Location: ' . BASEURL . '/dashboard/user_detail/' . $user_type . '/' . $_POST['account-id']);
            exit;
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function account_update($user_type = null) {
        if ($user_type == "asesor" || $user_type == "asesi") {
            if ($this->model('User_model')->updateAccount($_POST, $user_type) > 0) {
                Flasher::setFlash('This account has been updated', 'success');
            }
            header('Location: ' . BASEURL . '/dashboard/user_detail/' . $user_type . '/' . $_POST['account-id']);
            exit;
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function add_user($user_type = null) {
        if ($user_type == "asesor" || $user_type == "asesi") {
            if ($this->model('User_model')->addAccount($_POST, $user_type) > 0) {
                Flasher::setFlash('This account has been updated', 'success');
            }
            header('Location: ' . BASEURL . '/dashboard/user_list/' . $user_type);
            exit;
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
}