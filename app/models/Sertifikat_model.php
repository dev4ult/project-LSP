<?php

// Convert HTML to PDF
use Dompdf\Dompdf;

require '../vendor/autoload.php';

class Sertifikat_model {
    private $db;

    public function __construct() {

        $this->db = new Database;
    }

    public function getTotalListPersyaratan() {
        $this->db->query('SELECT * FROM list_persyaratan');
        return count($this->db->resultSet());
    }

    public function getIdBiodata($username) {

        $query = "SELECT id_biodata_asesi FROM asesi WHERE username =:username";

        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single()['id_biodata_asesi'];
    }

    public function getTotalData($id_skema, $table) {

        $query = "SELECT * FROM " . $table . " WHERE id_skema=:id_skema";

        $this->db->query($query);
        $this->db->bind("id_skema", $id_skema);

        return count($this->db->resultSet());
    }

    public function checkUnitKom($id) {

        $query = "SELECT dokumen_asesmen.id_unit_kompetensi FROM unit_kompetensi 
                        JOIN dokumen_asesmen ON dokumen_asesmen.id_unit_kompetensi = unit_kompetensi.id 
                        JOIN skema_sertifikasi ON unit_kompetensi.id_skema = skema_sertifikasi.id
                        WHERE id_skema = :id_skema";

        $this->db->query($query);
        $this->db->bind("id_skema", $id);

        return count($this->db->resultSet());
    }

    public function checkLulus($id_skema) {
        $id_bio = $this->getIdBiodata($_SESSION['username']);

        $query = "SELECT status_kelulusan FROM daftar_asesi_sertifikasi WHERE id_biodata_asesi = :id_biodata_asesi AND id_skema_sertifikasi=:id_skema";

        $this->db->query($query);
        $this->db->bind("id_biodata_asesi", $id_bio);
        $this->db->bind("id_skema", $id_skema);

        return $this->db->single()['status_kelulusan'];
    }

    public function fetchAllSertifikasiAsesi() {
        $this->db->query("SELECT * FROM daftar_asesi_sertifikasi");
        return $this->db->resultSet();
    }

    public function getDataSertifikat($id_skema) {

        $idBio = $this->getIdBiodata($_SESSION['username']);

        $query = "SELECT DISTINCT biodata_asesi.nama As nama_asesi, biodata_asesi.nim, skema_sertifikasi.nama_skema, biodata_asesor.nama As nama_asesor FROM daftar_asesi_sertifikasi 
                        JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id
                        JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id 
                        JOIN biodata_asesi ON daftar_asesi_sertifikasi.id_biodata_asesi = biodata_asesi.id 
                        WHERE daftar_asesi_sertifikasi.id_biodata_asesi = :id_biodata_asesi AND daftar_asesi_sertifikasi.id_skema_sertifikasi= :id_skema";

        $this->db->query($query);

        $this->db->bind("id_biodata_asesi", $idBio);
        $this->db->bind("id_skema", $id_skema);

        return $this->db->single();
    }

    public function buildSertifikat($data) {

        $dompdf = new Dompdf();

        // Load content from html file
        $dompdf->loadHtml('
                            <div class="container" style="border: solid 2px black;">
                                <div class="width-text" style="margin: 0 20px; padding: 20px 0">
                                    <h1 align="center">Sertifikat Kompetensi Profesi Bidang ' . $data['nama_skema'] . '</h1>
                                    <p align="center"> Diberikan Kepada : </p>
                                    <h1 align="center">' . $data['nama_asesi'] . '</h1>
                                    <h3 align="center">(' . $data['nim'] . ')</h3>
                                    <p align="center"> 
                                        Sebagai Peserta Program Sertifikasi Profesi Untuk Sertifikasi ' . $data['nama_skema'] . ' yang diselenggarakan oleh 
                                        Politeknik Negeri Jakarta yang bekerja sama dengan Badan Nasional Sertifikasi Profesi (BNSP) di 
                                        Lingkungan Politeknik Negeri Jakarta pada tanggal 20 November 2022. 
                                    </p>
                                </div>
                                </div>
                        ');

        $dompdf->setPaper('A5', 'landscape');

        // Render the HTML as PDF 
        $dompdf->render();

        // Output the generated PDF to Browser 
        $dompdf->stream("Sertifikat", array("Attachment" => 0));
    }

    public function searchSertifikat($page) {
        $keyword = $_POST['keyword'];
        $query = $query = "SELECT skema_sertifikasi.id, skema_sertifikasi.nama_skema, skema_sertifikasi.tgl_Kadaluarsa_sertifikasi FROM daftar_asesi_sertifikasi
                                JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi=skema_sertifikasi.id WHERE nama_skema LIKE :keyword LIMIT :page, 5";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        $this->db->bind("page", 5 * ($page - 1));

        return $this->db->resultSet();
    }
}