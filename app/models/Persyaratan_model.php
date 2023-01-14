<?php
class Persyaratan_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function addData($data) {
    $query = "INSERT INTO list_persyaratan VALUES ('', :jenis, :deskripsi)";
    $this->db->query($query);
    $this->db->bind("jenis", $data['kategori']);
    $this->db->bind("deskripsi", $data['persyaratan']);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      Flasher::setFlash("Persyaratan sudah ada dalam database", 'warning');
    }
  }

  public function fetchAllPersyaratan($kategori) {
    $query = "SELECT id, deskripsi from list_persyaratan WHERE kategori=:kategori ORDER BY id ASC";
    $this->db->query($query);
    $this->db->bind("kategori", $kategori);
    return $this->db->resultSet();
  }

  public function fetchAllPersyaratanByIdSkemaKategori($id, $kategori) {
    $query = "SELECT persyaratan_skema.deskripsi FROM persyaratan_skema JOIN list_persyaratan ON persyaratan_skema.deskripsi = list_persyaratan.deskripsi WHERE persyaratan_skema.id_skema =:idSkema AND list_persyaratan.kategori =:kategori;
    ";
    $this->db->query($query);
    $this->db->bind("kategori", $kategori);
    $this->db->bind("idSkema", $id);
    return $this->db->resultSet();
  }

  public function getIdSkemaByNama($nama, $level) {
    $query = "SELECT id FROM skema_sertifikasi WHERE nama_skema LIKE :nama AND level LIKE :level";
    $this->db->query($query);
    $this->db->bind("nama", "%" . $nama . "%");
    $this->db->bind("level", "%" . $level . "%");
    return $this->db->single();
  }

  public function getIdPersyaratanBySkema($deskripsi, $idSkema) {
    $query = "SELECT id FROM persyaratan_skema WHERE deskripsi=:deskripsi AND id_skema=:id";
    $this->db->query($query);
    $this->db->bind("deskripsi", $deskripsi);
    $this->db->bind("id", $idSkema);
    return $this->db->single();
  }

  public function addDataPersyaratanSkema($id, $deskripsi) {
    // $idSkema = $this->getIdSkemaByNama($nama, $level)['id'];
    $query = "INSERT INTO persyaratan_skema VALUES ('', :deskripsi, :idskema)";
    $this->db->query($query);
    $this->db->bind("deskripsi", $deskripsi);
    $this->db->bind("idskema", $id);
    $this->db->execute();
    $this->db->rowChangeCheck();
  }

  public function deleteDataPersyaratanSkema($deskripsi, $idSkema) {
    // $id = $this->getIdPersyaratanBySkema($deskripsi, $idSkema);
    $query = "DELETE FROM persyaratan_skema WHERE id_skema=:idSyarat AND deskripsi=:deskripsi";
    $this->db->query($query);
    $this->db->bind("idSyarat", $idSkema);
    $this->db->bind("deskripsi", $deskripsi);
    $this->db->execute();
  }

  public function fetchPersyaratanBySkema($id) {
    // $idSkema = $this->getIdSkemaByNama($nama, $level)['id'];
    $query = "SELECT deskripsi from persyaratan_skema WHERE id_skema=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->resultSet();
  }

  public function fetchSkema() {
    $query = "SELECT DISTINCT nama_skema from skema_sertifikasi ORDER BY nama_skema ASC";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function fetchLevelBySkema($id) {
    $query = "SELECT level from skema_sertifikasi WHERE id LIKE :id ORDER BY level";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->resultSet();
  }

  public function countPersyaratanByID($id) {
    $query = "SELECT COUNT(*) as jumlah from persyaratan_skema WHERE id_skema =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }
}