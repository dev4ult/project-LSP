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
        $this->model('User_model')->checkUserLogin();
    }

    public function admin() {
        $this->model('User_model')->checkUserLogin("admin");

        $data['page-title'] = 'dashboard';
        $this->view('templates/header', $data);

        $this->view('templates/navbar/dashboard-navbar');

        $data['page'] = $this->breadcrumbs;
        array_pop($data['page']['name']);
        array_pop($data['page']['link']);
        $this->view('templates/breadcrumbs', $data);

        $data['username'] = $_SESSION['username'];
        $this->view('dashboard/admin/index', $data);

        $this->view('templates/footer');
    }

    public function asesi() {
        $this->model('User_model')->checkUserLogin("asesi");
        $data['page-title'] = 'Dashboard Asesi LSP';

        $this->view('templates/header', $data);
        $this->view('templates/navbar/dashboard-navbar');

        $data['username'] = $_SESSION['username'];
        $this->view('dashboard/asesi/index', $data);

        $this->view('templates/footer');
    }

    public function asesor() {
        $this->model('User_model')->checkUserLogin("asesor");
        $data['page-title'] = 'Dashboard page';
        $this->view('templates/header', $data);

        $this->view('templates/navbar/dashboard-navbar');

        $this->view('dashboard/asesor/index');

        $this->view('templates/footer');
    }

    public function user_list($user_type = null, $index = 1) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            $data['page-title'] = 'list ' . $user_type;
            $this->view("templates/header", $data);
            $this->view('templates/navbar/dashboard-navbar');

            $data["page"] = $this->breadcrumbs;
            $data['user-type'] = $user_type;
            $this->view('templates/breadcrumbs', $data);

            $data['jurusan'] = $this->model("User_model")->fetchAllJurusan();

            $this->view('dashboard/admin/form/add_' . $user_type, $data);

            $keyword = "";
            if (isset($_POST['search-key'])) {
                $keyword = htmlspecialchars($_POST['search-key']);
            }

            if (isset($_POST['table-limit'])) {
                $_SESSION['table-limit'] = $_POST['table-limit'];
            }

            $limit = 5;
            if (isset($_SESSION['table-limit'])) {
                $limit = $_SESSION['table-limit'];
            }

            $data['list-user'] = $this->model('User_model')->fetchAllUser($user_type, $keyword, $index - 1, $limit);
            $data["page"] = $index;
            $data['limit'] = $limit;

            $data['url'] = "dashboard/user_list/" . $user_type;
            $this->view('dashboard/admin/form/pagination', $data);

            $this->view('dashboard/admin/list/user', $data);


            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
            exit;
        }
    }

    public function user_detail($user_type, $user_id) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            $data['page-title'] = 'detail';
            $this->view("templates/header", $data);

            $data["page"] = $this->breadcrumbs;
            array_push($data["page"]["name"], "list " . $user_type);
            array_push($data["page"]["link"], "dashboard/user_list/" . $user_type);


            $this->view('templates/breadcrumbs', $data);
            $data['user-type'] = $user_type;

            $data['jurusan'] = $this->model("User_model")->fetchAllJurusan();

            $data['user'] = $this->model('User_model')->fetchSingleUser($user_type, $user_id);
            $this->view('dashboard/admin/detail/' . $user_type, $data);

            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
            exit;
        }
    }

    public function bio_update($user_type = null) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            if ($this->model('User_model')->updateBiodata($_POST, $user_type) > 0) {
                Flasher::setFlash('This account has been updated', 'success');
            }
            header('Location: ' . BASEURL . '/dashboard/user_detail/' . $user_type . '/' . $_POST['account-id']);
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
        }
        exit;
    }

    public function account_update($user_type = null) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            if ($this->model('User_model')->updateAccount($_POST, $user_type) > 0) {
                Flasher::setFlash('This account has been updated', 'success');
            }
            header('Location: ' . BASEURL . '/dashboard/user_detail/' . $user_type . '/' . $_POST['account-id']);
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
        }
        exit;
    }

    public function add_user($user_type = null) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            if ($this->model('User_model')->addUser($_POST, $user_type) > 0) {
                Flasher::setFlash('This account has been updated', 'success');
            }
            header('Location: ' . BASEURL . '/dashboard/user_list/' . $user_type);
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
        }
        exit;
    }

    public function delete_user($user_type = null, $bio_id) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            if ($this->model('User_model')->deleteUser($user_type, $bio_id) > 0) {
                Flasher::setFlash('One account has been deleted', 'success');
            }
            header('Location: ' . BASEURL . '/dashboard/user_list/' . $user_type);
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
        }
        exit;
    }

    public function search_user($user_type = null, $index = 1) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            $data['page-title'] = 'list ' . $user_type;
            $this->view("templates/header", $data);
            $this->view('templates/navbar/dashboard-navbar');

            $data["page"] = $this->breadcrumbs;
            $data['user-type'] = $user_type;
            $this->view('templates/breadcrumbs', $data);

            $this->view('dashboard/admin/form/add_' . $user_type);
            $data['list-user'] = $this->model('User_model')->findUserByKeyword($_POST['search-key'], $user_type, $index);
            $data["page"] = $index;
            $this->view('dashboard/admin/list/user', $data);
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
            exit;
        }
    }
}