<?php
class Dokumen_model {
    private $db;

    public function __construct() {

        $this->db = new Database();
    }

    public function fetchAllListPersyaratan() {

        $query = "SELECT * FROM list_persyaratan";

        $this->db->query($query);
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

        $query = "SELECT * FROM dokumen_persyaratan WHERE id_biodata_asesi = :id_biodata_asesi";

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

                Flasher::setFlash('Extensi file salah !');
                return false;
            } else if ($file_size > 2097152) {

                Flasher::setFlash('Ukuran file tidak boleh melebihi 2 MB');
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
                    Flasher::setFlash('Pilih Jenis Persyaratan Terlebih dahulu');
                    return false;
                }
            }
        } else {
            Flasher::setFlash('File tidak ada');
            return false;
        }
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