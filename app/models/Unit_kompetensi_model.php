<?php

    class Unit_kompetensi_model{
        private $db;

        public function __construct(){

            $this->db = new Database;
        }

        public function getIdBiodata($username){
            
            $query = "SELECT id_biodata_asesi FROM asesi WHERE username =:username";

            $this->db->query($query);
            $this->db->bind('username', $username);
            return $this->db->single()['id_biodata_asesi'];

        }

        public function getUnitKompetensiByid($idKompetensi){

            $query = "SELECT * FROM unit_kompetensi WHERE id=:id";

            $this->db->query($query);
            $this->db->bind('id', $idKompetensi);

            return $this->db->single();
        }

        public function uploadUnitKom($data, $id){

            $idBio = $this->getIdBiodata($_SESSION['username']);

            $file_name = $_FILES['document']['name'];
            $file_size = $_FILES['document']['size'];
            $file_tmp = $_FILES['document']['tmp_name'];
            $extensions = ['jpg', 'jpeg', 'png', 'pdf'];
            $file_ext = explode('.',$file_name);
            $file_type = $file_ext[1];

            if(!in_array($file_type, $extensions)){

                Flasher::setFlash('Extensi file salah !');
                return false;
                
            } else if($file_size > 26214400){

                Flasher::setFlash('Ukuran file tidak boleh melebihi 25 MB');
                return false;

            } else {                
    
                $query = "INSERT INTO dokumen_asesmen VALUES('', :id_unit_kompetensi, :id_biodata_asesi, :file_asesmen)";

                $this->db->query($query);

                $this->db->bind('file_asesmen', $file_name);
                $this->db->bind('id_unit_kompetensi', $id);
                $this->db->bind('id_biodata_asesi', $idBio);

                $this->db->execute();

                return $this->db->rowChangeCheck();

                move_uploaded_file($file_tmp, 'public/img/'.$file_name);
            } 
        }

        public function checkUnitUpload($id){

            $query = "SELECT * FROM dokumen_asesmen WHERE id_unit_kompetensi=:id_unit_kompetensi";

            $this->db->query($query);

            $this->db->bind('id_unit_kompetensi', $id);

            return count($this->db->resultSet());
        }
    }