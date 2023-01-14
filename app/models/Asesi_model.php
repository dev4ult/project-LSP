<?php
class Asesi_model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function updateStatusKelulusan($idAsesi, $idSkema, $status = "Belum Lulus")
  {
    $query = "UPDATE daftar_asesi_sertifikasi SET status_kelulusan =:status, status_asesmen='Sudah' WHERE id_biodata_asesi =:idAsesi AND id_skema_sertifikasi =:idSkema";
    $this->db->query($query);
    $this->db->bind("status", $status);
    $this->db->bind("idAsesi", $idAsesi);
    $this->db->bind("idSkema", $idSkema);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function getStatusAsesmen($idSkema, $idAsesi)
  {
    $query = "SELECT status_asesmen FROM daftar_asesi_sertifikasi WHERE id_biodata_asesi =:idAsesi AND id_skema_sertifikasi =:idSkema";
    $this->db->query($query);
    $this->db->bind("idAsesi", $idAsesi);
    $this->db->bind("idSkema", $idSkema);
    return $this->db->single()['status_asesmen'];
  }

  public function fetchNilaiDokumenAsesi($idAsesi)
  {
    $query = "SELECT id_kompetensi as id, nilai FROM penilaian_asesmen WHERE id_biodata_asesi =:id";
    $this->db->query($query);
    $this->db->bind("id", $idAsesi);
    return $this->db->resultSet();
  }
}
