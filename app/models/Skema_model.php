<?php
    class Skema_model {
        private $db;

        public function __construct(){

            $this->db = new Database;
        }

        public function fetchAllSchema($status, $page){

            $query = "SELECT * FROM skema_sertifikasi WHERE status=:status LIMIT :page, 5";

            $this->db->query($query);
            $this->db->bind("status", $status);
            $this->db->bind("page", 5 * ($page - 1));

            return $this->db->resultSet();
        }

        public function getSkemaById($id){

            $query = "SELECT * FROM skema_sertifikasi WHERE id=:id";

            $this->db->query($query);
            $this->db->bind("id", $id);

            return $this->db->single();
        }

        public function getDataSkemaById($id_skema, $table){

            $query = "SELECT * FROM ".$table." WHERE id_skema=:id_skema";

            $this->db->query($query);
            $this->db->bind('id_skema', $id_skema);

            return $this->db->resultSet();
        }

        public function getTotalData($id_skema, $table){

            $query = "SELECT * FROM ".$table." WHERE id_skema=:id_skema";

            $this->db->query($query);
            $this->db->bind("id_skema", $id_skema);

            return count($this->db->resultSet());
        }

        public function searchSkema($page){
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM skema_sertifikasi WHERE nama_skema LIKE :keyword LIMIT :page, 5";

            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            $this->db->bind("page", 5 * ($page - 1));

            return $this->db->resultSet();
        }

        public function getIdBiodata($username){
            
            $query = "SELECT id_biodata_asesi FROM asesi WHERE username =:username";

            $this->db->query($query);
            $this->db->bind('username', $username);
            return $this->db->single()['id_biodata_asesi'];

        }

        public function getTotalUpload(){

            $idBio = $this->getIdBiodata($_SESSION['username']);

            $query = "SELECT file_dokumen FROM dokumen_persyaratan WHERE id_biodata_asesi = :id_biodata_asesi";

            $this->db->query($query);
            $this->db->bind('id_biodata_asesi', $idBio);

            return count($this->db->resultSet());

        }

        public function getSkemaAsesi($page){
            
            $query = "SELECT skema_sertifikasi.id, skema_sertifikasi.nama_skema FROM daftar_asesi_sertifikasi
                      JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi=skema_sertifikasi.id LIMIT :page, 5";

            $this->db->query($query);
            $this->db->bind("page", 5 * ($page - 1));

            return $this->db->resultSet();
        }

        
        public function searchSkemaAsesi($page){
            $keyword = $_POST['keyword'];
            $query = "SELECT skema_sertifikasi.id, skema_sertifikasi.nama_skema FROM daftar_asesi_sertifikasi
                      JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi=skema_sertifikasi.id 
                      WHERE nama_skema LIKE :keyword LIMIT :page, 5";

            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            $this->db->bind("page", 5 * ($page - 1));

            return $this->db->resultSet();
        }

        public function registSkema($data){

            $idBio = $this->getIdBiodata($_SESSION['username']);

            $query = "INSERT INTO daftar_asesi_sertifikasi SET id_biodata_asesi=:id_biodata_asesi, id_skema_sertifikasi = :id_skema_sertifikasi";

            $this->db->query($query);
            $this->db->bind('id_biodata_asesi', $idBio);
            $this->db->bind('id_skema_sertifikasi', $data);

            $this->db->execute();

            return $this->db->rowChangeCheck();
        }

        public function getScheduleSkema($page){

            $idBio = $this->getIdBiodata($_SESSION['username']);

            $query =   "SELECT DiSTINCT unit_kompetensi.id, unit_kompetensi.jenis_pelaksanaan, unit_kompetensi.nama_kompetensi, skema_sertifikasi.nama_skema, biodata_asesor.nama, 
                        unit_kompetensi.tgl_ujian_kompetensi, unit_kompetensi.jam_mulai, unit_kompetensi.jam_akhir, 
                        unit_kompetensi.tempat_unit_kompetensi FROM daftar_asesi_sertifikasi      
                        JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id
                        JOIN unit_kompetensi ON skema_sertifikasi.id = unit_kompetensi.id_skema
                        JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id 
                        WHERE daftar_asesi_sertifikasi.id_biodata_asesi =:id_biodata_asesi LIMIT :page, 5";

            $this->db->query($query);
            $this->db->bind('id_biodata_asesi', $idBio);
            $this->db->bind("page", 5 * ($page - 1));

            return $this->db->resultSet();
        }

        public function searchJadwal($page){
            $keyword = $_POST['keyword'];
            $query = "SELECT DiSTINCT unit_kompetensi.id, unit_kompetensi.jenis_pelaksanaan, unit_kompetensi.nama_kompetensi, skema_sertifikasi.nama_skema, biodata_asesor.nama, 
                      unit_kompetensi.tgl_ujian_kompetensi, unit_kompetensi.jam_mulai, unit_kompetensi.jam_akhir, 
                      unit_kompetensi.tempat_unit_kompetensi FROM daftar_asesi_sertifikasi      
                      JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id
                      JOIN unit_kompetensi ON skema_sertifikasi.id = unit_kompetensi.id_skema
                      JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id 
                      WHERE nama_kompetensi LIKE :keyword LIMIT :page, 5";

            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            $this->db->bind("page", 5 * ($page - 1));

            return $this->db->resultSet();
        }
    }