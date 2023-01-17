<?php

class Dashboard extends Controller {

    private $breadcrumbs;

    public function __construct() {
        $this->breadcrumbs = [
            "name" => [
                "Dashboard"
            ],
            "link" => [
                "dashboard"
            ]
        ];
    }

    public function index() {
        $this->model('User_model')->checkUserLogin();
    }

    public function admin() {
        $this->model('User_model')->checkUserLogin("admin");

        $data['page-title'] = 'Dashboard Admin';
        $this->view('templates/header', $data);

        $data['last-3-created'] = $this->model("Skema_model")->fetchThreeLastCreatedSchema();

        $data['username'] = $_SESSION['username'];
        $data['total-asesor'] = $this->model("User_model")->getUserTotal('asesor');
        $data['total-asesi'] = $this->model("User_model")->getUserTotal('asesi');
        $data['total-skema'] = $this->model("Skema_model")->getTotalSchema();
        $data['total-list-persyaratan'] = $this->model("Sertifikat_model")->getTotalListPersyaratan();

        $data['nomor-induk'] = $this->model("User_model")->getUserRegNumber($_SESSION['username'], "admin", "nip");
        $this->view('templates/sidebar');

        $data['user-type'] = 'admin';
        $this->view('dashboard/admin/index', $data);
        $this->view('templates/close_html_tag');
    }

    public function asesi() {
        $this->model('User_model')->checkUserLogin("asesi");

        $data['page-title'] = 'Dashboard Asesi';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');

        $data['nomor-induk'] = $this->model("User_model")->getUserRegNumber($_SESSION['username'], "asesi", "nim");

        $data['user-type'] = 'asesi';
        $data['username'] = $_SESSION['username'];
        $data['total-skema'] = $this->model("Skema_model")->getTotalSchema();
        $asesi_id = $this->model('User_model')->getIdBioByUsername('asesi', $data['username']);
        $data['total-skema-saya'] = count($this->model('Skema_model')->getSchemaOfAsesi($asesi_id));

        $this->view('dashboard/asesi/index', $data);
        $this->view('templates/close_html_tag');
    }

    public function asesor() {
        $this->model('User_model')->checkUserLogin("asesor");

        $data['page-title'] = 'Dashboard Asesor';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');

        $data['username'] = $_SESSION['username'];
        $data['nomor-induk'] = $this->model("User_model")->getUserRegNumber($_SESSION['username'], "asesor", "nip");
        $data['user-type'] = "asesor";


        // $data['list-skema-asesor'] = $this->model("Asesor_model")->getSkemaByAsesor($page);

        $this->view('dashboard/asesor/index', $data);
        $this->view('templates/close_html_tag');
    }

    public function logout() {
        unset($_SESSION['user-type']);
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        header('Location: ' . BASEURL . '/login');
        exit;
    }

    public function edit_profile($user_type = null) {
        // $this->model('User_model')->checkUserLogin();

        if ($user_type == "asesor" || $user_type == "asesi" || $user_type == "admin") {

            if ($_SESSION['user-type'] != $user_type) {
                header('Location: ' . BASEURL . '/dashboard/edit_profile/' . $_SESSION['user-type']);
                exit;
            }

            $data['page-title'] = "Edit Profil";

            $this->view('templates/header', $data);

            $this->view('templates/sidebar');
            $data['user'] = $this->model('User_model')->fetchSingleUserByUsername($user_type, $_SESSION['username']);

            $data['user-type'] = $user_type;
            $data['page-link'] = $this->breadcrumbs;
            $this->view('dashboard/' . $user_type . '/edit_profile', $data);
            $this->view('templates/close_html_tag');
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function change_password($user_type = null) {
        if ($user_type == "asesor" || $user_type == "asesi" || $user_type == "admin") {
            if ($this->model('User_model')->changePassword($_POST, $user_type) > 0) {
                Flasher::setFlash('Password telah diupdate', 'success');
                header('Location: ' . BASEURL . '/dashboard/logout');
            } else {
                header('Location: ' . BASEURL . '/dashboard/edit_profile/' . $_SESSION['user-type']);
            }
        } else {
            header('Location: ' . BASEURL . '/dashboard');
        }
        exit;
    }

    public function profile_update($user_type = null) {
        // $this->model('User_model')->checkUserLogin('');

        if ($user_type == "asesor" || $user_type == "asesi" || $user_type == "admin") {
            if ($this->model('User_model')->updateProfile($_POST, $user_type) > 0) {
                Flasher::setFlash('Akun telah diupdate', 'success');
            }
        }
        header('Location: ' . BASEURL . '/dashboard/edit_profile/' . $_SESSION['user-type']);
        exit;
    }


    public function user_list($user_type = null, $index = 1) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            if ((int)$index <= 0) {
                header('Location: ' . BASEURL . '/dashboard/user_list/' . $user_type);
                exit;
            }

            $data['page-title'] = 'List ' . ucfirst($user_type);
            $this->view("templates/header", $data);

            $data['user-type'] = $user_type;

            $data['jurusan'] = $this->model("User_model")->fetchAllJurusan();

            $this->view('templates/sidebar');


            $keyword = "";
            if (isset($_POST['search-key'])) {
                $keyword = htmlspecialchars($_POST['search-key']);
            }

            if (isset($_POST['table-limit'])) {
                $_SESSION['table-limit'] = $_POST['table-limit'];
            }

            $limit = 5;
            $total_page = ceil($this->model('User_model')->getUserTotal($user_type) / $limit);
            if (isset($_SESSION['table-limit'])) {
                $limit = $_SESSION['table-limit'];
                $total_page = ceil($this->model('User_model')->getUserTotal($user_type) / $limit);
            }

            if ((int)$index > $total_page) {
                header('Location: ' . BASEURL . '/dashboard/user_list/' . $user_type);
                exit;
            }

            $data['list-user'] = $this->model('User_model')->fetchAllUserConditional($user_type, $keyword, $index - 1, $limit);
            $data["page"] = $index;
            $data['limit'] = $limit;
            $data['page-total'] = $total_page;

            $data['url'] = "dashboard/user_list/" . $user_type;
            // $this->view('dashboard/admin/form/pagination', $data);

            $data['page-link'] = $this->breadcrumbs;

            $data['page-controller'] = "dashboard/user_list/" . $user_type;
            $this->view('dashboard/admin/list/user', $data);
            $this->view('templates/close_html_tag');
        } else {
            header('Location: ' . BASEURL . '/dashboard/admin');
            exit;
        }
    }

    public function user_detail($user_type, $user_id) {
        $this->model('User_model')->checkUserLogin("admin");

        if ($user_type == "asesor" || $user_type == "asesi") {
            $data['page-title'] = 'Detail ' . ucfirst($user_type);
            $this->view("templates/header", $data);

            $data["page-link"] = $this->breadcrumbs;
            array_push($data["page-link"]["name"], "List " . ucfirst($user_type));
            array_push($data["page-link"]["link"], "dashboard/user_list/" . $user_type);

            $this->view('templates/sidebar');

            $data['user-type'] = $user_type;

            $data['jurusan'] = $this->model("User_model")->fetchAllJurusan();

            $data['user'] = $this->model('User_model')->fetchSingleUser($user_type, $user_id);
            $this->view('dashboard/admin/detail/' . $user_type, $data);
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