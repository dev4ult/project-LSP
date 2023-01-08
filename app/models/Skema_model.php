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

            return $this->db->single();
        }

        public function getTotalData($id_skema, $table){

            $query = "SELECT * FROM ".$table." WHERE id_skema=:id_skema";

            $this->db->query($query);
            $this->db->bind("id_skema", $id_skema);

            return count($this->db->resultSet());
        }

        public function searchSkema(){
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM skema_sertifikasi WHERE nama_skema LIKE :keyword";

            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");

            return $this->db->resultSet();
        }
    }