<?php

class User_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function checkUserLogin($account_type = "") {
        if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['user-type'])) {
            $_SESSION['login'] = false;
            header('Location: ' . BASEURL . '/login');
            exit;
        } else if ($_SESSION['user-type'] != $account_type) {
            header('Location: ' . BASEURL . '/dashboard/' . $_SESSION['user-type']);
        }
    }

    public function account_join_biodata($table) {
        return "SELECT * FROM " . $table . " JOIN biodata_" . $table . " ON " . $table . ".id_biodata_" . $table . " = biodata_" . $table . ".id";
    }

    public function fetchAllUser($user_type, $keyword, $page, $limit) {
        $query_select = $this->account_join_biodata($user_type);
        $search_key = htmlspecialchars($keyword);
        if ($keyword != "") {
            $query_select = $query_select . " WHERE biodata_" . $user_type . ".nama LIKE '%" . $search_key . "%' OR " . $user_type . ".username LIKE '%" . $search_key . "%'";
        }
        $this->db->query($query_select . " LIMIT :page, :limit");

        $this->db->bind("page", $page * 5);
        $this->db->bind("limit", (int)$limit);


        return $this->db->resultSet();
    }

    public function fetchSingleUser($user_type, $id) {
        $this->db->query($this->account_join_biodata($user_type) . " WHERE biodata_" . $user_type . ".id=:id");
        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function accountIsExist($username, $email) {
        $tables = ["admin", "asesi", "asesor"];
        for ($i = 0; $i < 3; $i++) {
            $this->db->query("SELECT * FROM " . $tables[$i] . " WHERE username=:username OR email=:email");

            $this->db->bind("username", $username);
            $this->db->bind("email", $email);

            $isExist = $this->db->single();
            if ($isExist > -1) {
                return true;
            }
        }

        return false;
    }

    public function getPassword($user_type, $account_id) {
        $this->db->query("SELECT password FROM " . $user_type . " WHERE id=:id");
        $this->db->bind("id", $account_id);

        return $this->db->single();
    }

    function getIdBio($user_type, $name) {
        $this->db->query("SELECT id FROM biodata_" . $user_type . " WHERE nama=:nama");
        $this->db->bind("nama", $name);

        return $this->db->single()['id'];
    }

    function getIdAccount($user_type, $bio_id) {
        $this->db->query("SELECT id FROM " . $user_type . " WHERE id_biodata_" . $user_type . "=:id");
        $this->db->bind("id", $bio_id);

        return $this->db->single()['id'];
    }

    public function addUser($data, $user_type) {

        // account data
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);

        if ($this->accountIsExist($username, $email)) {
            Flasher::setFlash("account with this username or email has already exist, try another username or email");
            return false;
        }

        // biodata
        $nama = htmlspecialchars($data['nama']);
        $no_telepon = htmlspecialchars($data['no_telepon']);
        $pendidikan_terakhir = htmlspecialchars($data['pendidikan_terakhir']);
        $alamat = htmlspecialchars($data['alamat']);
        $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);

        $query_field = "(nama, no_telepon, pendidikan_terakhir, alamat, jenis_kelamin";
        $query_values = "(:nama, :no_telepon, :pendidikan_terakhir, :alamat, :jenis_kelamin";
        if ($user_type == "asesor") {
            $nik = htmlspecialchars($data['nik']);
            $nip = htmlspecialchars($data['nip']);
            $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
            $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);

            $query_field = $query_field . ", nik, nip, tempat_lahir, tanggal_lahir)";
            $query_values = $query_values . ", :nik, :nip, :tempat_lahir, :tanggal_lahir)";
        } else if ($user_type == "asesi") {
            $nim = htmlspecialchars($data['nim']);
            $query_field = $query_field . ", nim)";
            $query_values = $query_values . ", :nim)";
        } else {
            return false;
        }

        $this->db->query("INSERT INTO biodata_" . $user_type . $query_field . " VALUES " . $query_values);

        $this->db->bind("nama", $nama);
        $this->db->bind("no_telepon", $no_telepon);
        $this->db->bind("pendidikan_terakhir", $pendidikan_terakhir);
        $this->db->bind("alamat", $alamat);
        $this->db->bind("jenis_kelamin", $jenis_kelamin);

        if ($user_type == "asesor") {
            $this->db->bind("nik", $nik);
            $this->db->bind("nip", $nip);
            $this->db->bind("tempat_lahir", $tempat_lahir);
            $this->db->bind("tanggal_lahir", $tanggal_lahir);
        } else {
            $this->db->bind("nim", $nim);
        }

        $this->db->execute();

        $id_bio = $this->getIdBio($user_type, $nama);

        $this->db->query("INSERT INTO " . $user_type . "(username, email, password, id_biodata_" . $user_type . ") VALUES (:username, :email, :password, :id_bio)");

        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        $this->db->bind("password", hash("sha256", $password));
        $this->db->bind("id_bio", $id_bio);

        $this->db->execute();

        return $this->db->rowChangeCheck();
    }

    public function updateAccount($data, $user_type) {

        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);

        if ($this->accountIsExist($username, $email)) {
            Flasher::setFlash("account with this username or email has already exist, try another username or email");
            return false;
        }

        $account_id = $this->getIdAccount($user_type, htmlspecialchars($data['account-id']));

        $query_set = "username=:username, email=:email";

        $new_password = htmlspecialchars($data['new-password']);

        if ($new_password != "") {
            $query_set = $query_set . ", password=:password";
        }

        // asesor / asesi side
        if (isset($data['old-password'])) {
            $old_pass = htmlspecialchars($data['old-password']);
            if (!password_verify($old_pass, $this->getPassword($user_type, $account_id))) {
                Flasher::setFlash("old pass is wrong");
                return false;
            }
        }

        $this->db->query("UPDATE " . $user_type . " SET " . $query_set . " WHERE id=:id");

        $this->db->bind("username", $username);
        $this->db->bind("email", $email);

        if ($new_password != "") {
            $this->db->bind("password", hash("sha256", $new_password));
        }

        $this->db->bind("id", $account_id);

        // execute update stmt
        $this->db->execute();
        return $this->db->rowChangeCheck();
    }

    public function updateBiodata($data, $user_type) {
        $bio_id = htmlspecialchars($data['bio-id']);
        $nama = htmlspecialchars($data['nama']);
        $no_telepon = htmlspecialchars($data['no_telepon']);
        $pendidikan_terakhir = htmlspecialchars($data['pendidikan_terakhir']);
        $alamat = htmlspecialchars($data['alamat']);
        $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);

        $query_set = "nama=:nama, no_telepon=:no_telepon, pendidikan_terakhir=:pendidikan_terakhir, alamat=:alamat, jenis_kelamin=:jenis_kelamin";

        if ($user_type == "asesor") {
            $nik = htmlspecialchars($data['nik']);
            $nip = htmlspecialchars($data['nip']);
            $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
            $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
            $query_set = $query_set . ", nik=:nik, nip=:nip, tempat_lahir=:tanggal_lahir, tanggal_lahir=:tanggal_lahir";
        } else if ($user_type == "asesi") {
            $nim = htmlspecialchars($data['nim']);
            $query_set = $query_set . ", nim=:nim";
        } else {
            return false;
        }

        $this->db->query("UPDATE biodata_" . $user_type . " SET " . $query_set . " WHERE id=:id");

        $this->db->bind("nama", $nama);
        $this->db->bind("no_telepon", $no_telepon);
        $this->db->bind("pendidikan_terakhir", $pendidikan_terakhir);
        $this->db->bind("alamat", $alamat);
        $this->db->bind("jenis_kelamin", $jenis_kelamin);

        if ($user_type == "asesor") {
            $this->db->bind("nik", $nik);
            $this->db->bind("nip", $nip);
            $this->db->bind("tempat_lahir", $tempat_lahir);
            $this->db->bind("tanggal_lahir", $tanggal_lahir);
        } else {
            $this->db->bind("nim", $nim);
        }

        $this->db->bind("id", $bio_id);

        // execute update stmt
        $this->db->execute();

        return $this->db->rowChangeCheck();
    }

    public function deleteUser($user_type, $bio_id) {
        $this->db->query('DELETE FROM biodata_' . $user_type . ' WHERE id=:id');
        $this->db->bind('id', $bio_id);

        $this->db->execute();

        return $this->db->rowChangeCheck();
    }
}