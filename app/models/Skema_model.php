<?php
class Skema_model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function fetchAllSkema($page)
  {
    $query = "SELECT skema_sertifikasi.id, nama_skema, skkni.skkni, status, level FROM skema_sertifikasi JOIN skkni ON skema_sertifikasi.id_skkni = skkni.id ORDER BY skema_sertifikasi.id ASC LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function addSkema($data)
  {
    $idSkkni = $this->getIdSKKNNI($data['SKKNI'])['id'];
    $query = "INSERT INTO skema_sertifikasi(id, nama_skema, id_skkni, status, level) VALUES ('', :nama, :idSkkni, 'Aktif', :level)";
    $this->db->query($query);
    $this->db->bind("nama", $data['skema']);
    $this->db->bind("idSkkni", $idSkkni);
    $this->db->bind("level", $data['level']);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function updateStatus($id, $status)
  {
    $query = "UPDATE skema_sertifikasi SET status =:status WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("status", $status);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function getSingleSkema($id)
  {
    $query = "SELECT skema_sertifikasi.id as id_skema, nama_skema, skkni.skkni as skkni, level FROM skema_sertifikasi JOIN skkni on skema_sertifikasi.id_skkni = skkni.id WHERE skema_sertifikasi.id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function fetchAllSKKNI()
  {
    $query = "SELECT skkni FROM skkni";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getIdSKKNNI($skkni)
  {
    $query = "SELECT id FROM skkni WHERE skkni = :skkni";
    $this->db->query($query);
    $this->db->bind("skkni", $skkni);
    return $this->db->single();
  }

  public function updateSkema($id, $data)
  {
    $idSkkni = $this->getIdSKKNNI($data['SKKNI'])['id'];
    $query = "UPDATE skema_sertifikasi SET nama_skema=:nama, id_skkni=:id_skkni, level=:level WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("nama", $data['skema']);
    $this->db->bind("id_skkni", $idSkkni);
    $this->db->bind("level", $data['level']);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }
}
