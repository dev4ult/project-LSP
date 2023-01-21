<?php

class User_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchAllJurusan() {
        $this->db->query("SELECT * FROM jurusan");
        return $this->db->resultSet();
    }

    public function checkUserLogin($account_type = "") {
        if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['user-type'])) {
            $_SESSION['login'] = false;
            header('Location: ' . BASEURL . '/login');
            exit;
        } else if ($_SESSION['user-type'] != $account_type) {
            header('Location: ' . BASEURL . '/dashboard/' . $_SESSION['user-type']);
            exit;
        }
    }

    public function account_join_biodata($table) {
        return "SELECT * FROM " . $table . " JOIN biodata_" . $table . " ON " . $table . ".id_biodata_" . $table . " = biodata_" . $table . ".id";
    }

    public function getUserTotal($user_type) {
        $this->db->query("SELECT * FROM " . $user_type);

        return count($this->db->resultSet());
    }

    public function getUserRegNumber($username, $user_type, $field) {
        $this->db->query($this->account_join_biodata($user_type) . " WHERE " . $user_type . ".username=:username");
        $this->db->bind("username", $username);

        return $this->db->single()[$field];
    }

    public function fetchAllUserConditional($user_type, $keyword, $page, $limit) {
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

    public function getIdJurusanOfAsesi($id) {
        $this->db->query("SELECT jurusan.id as id_jurusan FROM biodata_asesi JOIN jurusan ON jurusan.nama = biodata_asesi.jurusan WHERE biodata_asesi.id=:id");
        $this->db->bind("id", $id);

        return $this->db->single()['id_jurusan'];
    }

    public function isAccountExistById($user_type, $id) {
        $this->db->query("SELECT * FROM biodata_" . $user_type . " WHERE id=:id");
        $this->db->bind("id", $id);

        return count($this->db->resultSet());
    }

    public function fetchSingleUser($user_type, $id) {
        $this->db->query($this->account_join_biodata($user_type) . " WHERE biodata_" . $user_type . ".id=:id");
        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function fetchSingleUserByUsername($user_type, $username) {
        $this->db->query($this->account_join_biodata($user_type) . " WHERE " . $user_type . ".username=:username");
        $this->db->bind("username", $username);

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

        return $this->db->single()['password'];
    }

    public function getIdBio($user_type, $name) {
        $this->db->query("SELECT id FROM biodata_" . $user_type . " WHERE nama=:nama");
        $this->db->bind("nama", $name);

        return $this->db->single()['id'];
    }

    public function getIdBioByUsername($user_type, $username) {
        $this->db->query("SELECT id_biodata_" . $user_type . " FROM " . $user_type . " WHERE username=:username");
        $this->db->bind("username", $username);

        return $this->db->single()['id_biodata_' . $user_type];
    }

    public function getIdAccount($user_type, $bio_id) {
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
        $no_telepon = htmlspecialchars($data['no-telepon']);
        $alamat = htmlspecialchars($data['alamat']);
        $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);

        $query_field = "(nama, no_telepon, jurusan, prodi, alamat, jenis_kelamin";
        $query_values = "(:nama, :no_telepon, :jurusan, :prodi, :alamat, :jenis_kelamin";
        if ($user_type == "asesor") {
            $nik = htmlspecialchars($data['nik']);
            $nip = htmlspecialchars($data['nip']);
            $pendidikan_terakhir = htmlspecialchars($data['pendidikan-terakhir']);
            $tempat_lahir = htmlspecialchars($data['tempat-lahir']);
            $tanggal_lahir = htmlspecialchars($data['tanggal-lahir']);

            $query_field = $query_field . ", nik, nip, pendidikan_terakhir, tempat_lahir, tanggal_lahir)";
            $query_values = $query_values . ", :nik, :nip, :pendidikan_terakhir, :tempat_lahir, :tanggal_lahir)";
        } else if ($user_type == "asesi") {
            $nim = htmlspecialchars($data['nim']);
            $jurusan = htmlspecialchars($data['jurusan']);
            $prodi = htmlspecialchars($data['prodi']);
            $query_field = $query_field . ", nim, jurusan, prodi)";
            $query_values = $query_values . ", :nim, :jurusan, :prodi)";
        } else {
            return false;
        }

        $this->db->query("INSERT INTO biodata_" . $user_type . $query_field . " VALUES " . $query_values);

        $this->db->bind("nama", $nama);
        $this->db->bind("no_telepon", $no_telepon);
        $this->db->bind("alamat", $alamat);
        $this->db->bind("jenis_kelamin", $jenis_kelamin);

        if ($user_type == "asesor") {
            $this->db->bind("nik", $nik);
            $this->db->bind("nip", $nip);
            $this->db->bind("pendidikan_terakhir", $pendidikan_terakhir);
            $this->db->bind("tempat_lahir", $tempat_lahir);
            $this->db->bind("tanggal_lahir", $tanggal_lahir);
        } else {
            $this->db->bind("nim", $nim);
            $this->db->bind("jurusan", $jurusan);
            $this->db->bind("prodi", $prodi);
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

        if (($username != "" || $email != "") && $this->accountIsExist($username, $email)) {
            Flasher::setFlash("account with this username or email has already exist, try another username or email", "error");
            return false;
        }

        $account_id = $this->getIdAccount($user_type, htmlspecialchars($data['account-id']));

        if ($username != "") {
            $query_set = "username=:username";
        }

        if ($username != "" && $email != "") {
            $query_set .= ", email=:email";
        } else if ($email != "") {
            $query_set = "email=:email";
        }

        $new_password = htmlspecialchars($data['new-password']);

        if (($username != "" || $email != "") && $new_password != "") {
            $query_set .= ", password=:password";
        } else if ($new_password != "") {
            $query_set = "password=:password";
        }

        $this->db->query("UPDATE " . $user_type . " SET " . $query_set . " WHERE id=:id");

        if ($username != "") {
            $this->db->bind("username", $username);
        }

        if ($email != "") {
            $this->db->bind("email", $email);
        }

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
        $no_telepon = htmlspecialchars($data['no-telepon']);
        $alamat = htmlspecialchars($data['alamat']);
        $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);

        $query_set = "nama=:nama, no_telepon=:no_telepon, alamat=:alamat, jenis_kelamin=:jenis_kelamin";

        if ($user_type == "asesor") {
            $nik = htmlspecialchars($data['nik']);
            $nip = htmlspecialchars($data['nip']);
            $pendidikan_terakhir = htmlspecialchars($data['pendidikan-terakhir']);
            $tempat_lahir = htmlspecialchars($data['tempat-lahir']);
            $tanggal_lahir = htmlspecialchars($data['tanggal-lahir']);
            $query_set = $query_set . ", nik=:nik, nip=:nip, pendidikan_terakhir=:pendidikan_terakhir, tempat_lahir=:tempat_lahir, tanggal_lahir=:tanggal_lahir";
        } else if ($user_type == "asesi") {
            $nim = htmlspecialchars($data['nim']);
            $jurusan = htmlspecialchars($data['jurusan']);
            $prodi = htmlspecialchars($data['prodi']);
            $query_set = $query_set . ", nim=:nim, jurusan=:jurusan, prodi=:prodi";
        } else {
            return false;
        }

        $this->db->query("UPDATE biodata_" . $user_type . " SET " . $query_set . " WHERE id=:id");

        $this->db->bind("nama", $nama);
        $this->db->bind("no_telepon", $no_telepon);
        $this->db->bind("alamat", $alamat);
        $this->db->bind("jenis_kelamin", $jenis_kelamin);

        if ($user_type == "asesor") {
            $this->db->bind("nik", $nik);
            $this->db->bind("nip", $nip);
            $this->db->bind("pendidikan_terakhir", $pendidikan_terakhir);
            $this->db->bind("tempat_lahir", $tempat_lahir);
            $this->db->bind("tanggal_lahir", $tanggal_lahir);
        } else {
            $this->db->bind("nim", $nim);
            $this->db->bind("jurusan", $jurusan);
            $this->db->bind("prodi", $prodi);
        }

        $this->db->bind("id", $bio_id);

        // execute update stmt
        $this->db->execute();

        return $this->db->rowChangeCheck();
    }

    public function checkIfUsernameOrEmailAvailable($id, $username, $email, $user_type) {
        $this->db->query("SELECT * FROM " . $user_type . " WHERE (username=:username OR email=:email) AND NOT id=:id");
        $this->db->bind("id", $id);
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        return count($this->db->resultSet());
    }

    public function changePassword($data, $user_type) {
        $account_id = $data['account-id'];
        $new_pass = htmlspecialchars($data['new-password']);
        $new_pass_conf = htmlspecialchars($data['new-password-confirmation']);
        $old_pass = htmlspecialchars($data['old-password']);

        $hashed_pass = $this->getPassword($user_type, $account_id);
        if (strcmp(hash("sha256", $old_pass), $hashed_pass)) {
            Flasher::setFlash("Password lama salah!", "error");
            return -1;
        }

        if ($new_pass != $new_pass_conf) {
            Flasher::setFlash("Password konfirmasi salah!", "error");
            return -1;
        }

        $this->db->query("UPDATE " . $user_type . " SET password=:password WHERE id=:id");
        $this->db->bind("password", hash("sha256", $new_pass));
        $this->db->bind("id", $account_id);

        $this->db->execute();
        return $this->db->rowChangeCheck();
    }

    public function isAsesiExist($id_asesi) {
        $this->db->query("SELECT * FROM biodata_asesi WHERE id=:id");
        $this->db->bind("id", $id_asesi);
        return count($this->db->resultSet()) > 0 ? true : false;
    }

    public function updateProfile($data, $user_type) {
        $bio_id = $data['bio-id'];
        $query_update = "UPDATE biodata_" . $user_type . " SET nama=:nama, alamat=:alamat, no_telepon=:no_telepon";

        $nama = htmlspecialchars($data['nama']);
        $alamat = htmlspecialchars($data['alamat']);
        $no_telepon = htmlspecialchars($data['no-telepon']);

        if ($user_type == "admin") {
            $query_update .= ", nip=:nip, nik=:nik, jenis_kelamin=:jenis_kelamin";
            $nip = htmlspecialchars($data['nip']);
            $nik = htmlspecialchars($data['nik']);
            $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);
        }

        if ($user_type == "admin" || $user_type == "asesor") {
            $query_update .= ", tanggal_lahir=:tanggal_lahir, tempat_lahir=:tempat_lahir";
            $tanggal_lahir = htmlspecialchars($data['tanggal-lahir']);
            $tempat_lahir = htmlspecialchars($data['tempat-lahir']);
        }

        $this->db->query($query_update . " WHERE id=:id");
        $this->db->bind('id', $bio_id);
        $this->db->bind('nama', $nama);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('no_telepon', $no_telepon);

        if ($user_type == "admin") {
            $this->db->bind('nip', $nip);
            $this->db->bind('nik', $nik);
            $this->db->bind('jenis_kelamin', $jenis_kelamin);
        }

        if ($user_type == "admin" || $user_type == "asesor") {
            $this->db->bind('tanggal_lahir', $tanggal_lahir);
            $this->db->bind('tempat_lahir', $tempat_lahir);
        }

        $this->db->execute();

        if ($user_type == "admin") {
            $username = htmlspecialchars($data['username']);
            $email = htmlspecialchars($data['email']);
            $account_id = $data['account-id'];

            if ($this->checkIfUsernameOrEmailAvailable($account_id, $username, $email, "admin") > 0) {
                Flasher::setFlash('Username atau email sudah pernah digunakan oleh user lain', 'error');
                return -1;
            }

            $this->db->query("UPDATE admin SET username=:username, email=:email WHERE id=:id");
            $this->db->bind("username", $username);
            $this->db->bind("email", $email);
            $this->db->bind("id", $account_id);

            $this->db->execute();

            $_SESSION['username'] = $username;
        }

        return $this->db->rowChangeCheck();
    }

    public function deleteUser($user_type, $bio_id) {
        $this->db->query('DELETE FROM biodata_' . $user_type . ' WHERE id=:id');
        $this->db->bind('id', $bio_id);

        $this->db->execute();

        return $this->db->rowChangeCheck();
    }
}