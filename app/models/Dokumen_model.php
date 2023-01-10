<?php
    class Dokumen_model{

        public function __construct() {

            $this->db = new Database();
             
        }

        public function fetchAllListPersyaratan(){

            $query = "SELECT * FROM list_persyaratan";

            $this->db->query($query);
            return $this->db->resultSet();

        }

        public function getIdBiodata($username){
            
            $query = "SELECT id_biodata_asesi FROM asesi WHERE username =:username";

            $this->db->query($query);
            $this->db->bind('username', $username);
            return $this->db->single()['id_biodata_asesi'];

        }

        public function getPersyaratan(){

            $idBio = $this->getIdBiodata($_SESSION['username']);

            $query = "SELECT * FROM dokumen_persyaratan WHERE id_biodata_asesi = :id_biodata_asesi";

            $this->db->query($query);
            $this->db->bind('id_biodata_asesi', $idBio);
            return $this->db->resultSet();
        }

        public function uploadFile($data){ 

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
            } else if($file_size > 2097152){
                Flasher::setFlash('Ukuran file tidak boleh melebihi 2 MB');
                return false;
            } else {
                $data['size'] = $file_size;
                $data['path'] = "public/img/".$file_name;
                move_uploaded_file($file_tmp, $data['path']);
    
                $query = "INSERT INTO dokumen_persyaratan VALUES('', :id_biodata_asesi, :id_persyaratan, :file_dokumen)";

                $this->db->query($query);
                $this->db->bind('file_dokumen', $file_name);
                $this->db->bind('id_biodata_asesi', $idBio);
                $this->db->bind('id_persyaratan', $data['syarat']);

                $this->db->execute();

                return $this->db->rowChangeCheck();

            } 
        }
    }