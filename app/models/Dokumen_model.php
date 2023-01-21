<?php
class Dokumen_model {
    private $db;

    public function __construct() {

        $this->db = new Database();
    }

    public function fetchAllListPersyaratan() {
        $this->db->query("SELECT * FROM list_persyaratan");
        return $this->db->resultSet();
    }

    public function fetchAllListPersyaratanOfSkema($id_skema) {
        $this->db->query("SELECT list_persyaratan.deskripsi, list_persyaratan.id FROM list_persyaratan JOIN persyaratan_skema ON list_persyaratan.deskripsi = persyaratan_skema.deskripsi WHERE list_persyaratan.kategori='Umum' AND persyaratan_skema.id_skema=:id");
        $this->db->bind("id", $id_skema);
        return $this->db->resultSet();
    }

    public function getIdBiodata($username) {

        $query = "SELECT id_biodata_asesi FROM asesi WHERE username =:username";

        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single()['id_biodata_asesi'];
    }

    public function getPersyaratan() {

        $idBio = $this->getIdBiodata($_SESSION['username']);

        $query = "SELECT * FROM dokumen_persyaratan WHERE id_biodata_asesi=:id_biodata_asesi";

        $this->db->query($query);

        $this->db->bind('id_biodata_asesi', $idBio);
        return $this->db->resultSet();
    }

    public function getfileName($id_persyaratan) {

        $idBio = $this->getIdBiodata($_SESSION['username']);

        $query = "SELECT file_dokumen FROM dokumen_persyaratan WHERE id_persyaratan = :id_persyaratan";

        $this->db->query($query);

        $this->db->bind('id_persyaratan', $id_persyaratan);
        return $this->db->single()['file_dokumen'];
    }

    public function uploadFile($data) {

        $idBio = $this->getIdBiodata($_SESSION['username']);

        if (!empty($_FILES['document']['name'])) {
            $file_name = $_FILES['document']['name'];
            $file_size = $_FILES['document']['size'];
            $file_tmp = $_FILES['document']['tmp_name'];
            $extensions = ['jpg', 'jpeg', 'png', 'pdf'];
            $file_ext = explode('.', $file_name);
            $file_type = $file_ext[1];

            if (!in_array($file_type, $extensions)) {

                Flasher::setFlash('Extensi file salah !', "error");
                return false;
            } else if ($file_size > 2097152) {

                Flasher::setFlash('Ukuran file tidak boleh melebihi 2 MB', "warning");
                return false;
            } else {

                if ($data['syarat'] != NULL) {
                    $query = "INSERT INTO dokumen_persyaratan VALUES('', :id_biodata_asesi, :id_persyaratan, :file_dokumen)";

                    $this->db->query($query);
                    $this->db->bind('file_dokumen', $file_name);
                    $this->db->bind('id_biodata_asesi', $idBio);
                    $this->db->bind('id_persyaratan', $data['syarat']);

                    $this->db->execute();

                    return $this->db->rowChangeCheck();

                    move_uploaded_file($file_tmp, 'public/img/' . $file_name);
                } else {
                    Flasher::setFlash('Pilih Jenis Persyaratan Terlebih dahulu', "warning");
                    return false;
                }
            }
        } else {
            Flasher::setFlash('File tidak ada', 'error');
            return false;
        }
    }

    public function isDocumentExist($id_persyaratan) {
        $idBio = $this->getIdBiodata($_SESSION['username']);

        $this->db->query("SELECT * FROM dokumen_persyaratan WHERE id_persyaratan=:id_persyaratan AND id_biodata_asesi=:id_biodata_asesi");
        $this->db->bind('id_persyaratan', $id_persyaratan);
        $this->db->bind('id_biodata_asesi', $idBio);

        return count($this->db->resultSet()) > 0 ? true : false;
    }

    public function deleteFile($id_persyaratan) {

        $idBio = $this->getIdBiodata($_SESSION['username']);

        $this->db->query('DELETE FROM dokumen_persyaratan WHERE id_persyaratan=:id_persyaratan AND id_biodata_asesi=:id_biodata_asesi');

        $this->db->bind('id_persyaratan', $id_persyaratan);
        $this->db->bind('id_biodata_asesi', $idBio);

        $this->db->execute();

        return $this->db->rowChangeCheck();
    }
}