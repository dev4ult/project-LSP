<?php
class Persyaratan_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function addData($data)
  {
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

  public function fetchAllPersyaratan()
  {
    $query = "SELECT id, deskripsi from list_persyaratan ORDER BY id ASC";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getIdSkemaByNama($nama, $level)
  {
    $query = "SELECT id FROM skema_sertifikasi WHERE nama_skema LIKE :nama AND level LIKE :level";
    $this->db->query($query);
    $this->db->bind("nama", "%" . $nama . "%");
    $this->db->bind("level", "%" . $level . "%");
    return $this->db->single();
  }

  public function addDataPersyaratanSkema($nama, $level, $deskripsi)
  {
    $idSkema = $this->getIdSkemaByNama($nama, $level)['id'];
    $query = "INSERT INTO persyaratan_skema VALUES ('', :deskripsi, :idskema)";
    $this->db->query($query);
    $this->db->bind("deskripsi", $deskripsi);
    $this->db->bind("idskema", $idSkema);
    $this->db->execute();
    $this->db->rowChangeCheck();
  }

  public function fetchPersyaratanBySkema($nama, $level)
  {
    $idSkema = $this->getIdSkemaByNama($nama, $level)['id'];
    $query = "SELECT deskripsi from persyaratan_skema WHERE id_skema=:id";
    $this->db->query($query);
    $this->db->bind("id", $idSkema);
    return $this->db->resultSet();
  }

  public function fetchSkema()
  {
    $query = "SELECT DISTINCT nama_skema from skema_sertifikasi ORDER BY nama_skema ASC";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function fetchLevelBySkema($nama)
  {
    $query = "SELECT level from skema_sertifikasi WHERE nama_skema LIKE :nama ORDER BY level";
    $this->db->query($query);
    $this->db->bind("nama", "%" . $nama . "%");
    return $this->db->resultSet();
  }

  public function countPersyaratanByID($id)
  {
    $query = "SELECT COUNT(*) as jumlah from persyaratan_skema WHERE id_skema =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }
}
