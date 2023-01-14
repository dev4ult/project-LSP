<?php
class Asesor_model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function getIDByUsernameLogin()
  {
    $query = "SELECT id_biodata_asesor FROM asesor WHERE username =:username";
    $this->db->query($query);
    $this->db->bind('username', $_SESSION['username']);
    return $this->db->single()['id_biodata_asesor'];
  }

  public function getSkemaByAsesor($page)
  {
    $id = $this->getIDByUsernameLogin();
    $query = "SELECT * FROM skema_sertifikasi WHERE id_biodata_asesor =:id LIMIT :page, 2";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->bind("page", 2 * ($page - 1));
    return $this->db->resultSet();
  }

  public function fetchAllAsesiByIDSkema($idSkema, $page)
  {
    // $id = $this->getIDByUsernameLogin()['id_biodata_asesor'];
    $query = "SELECT biodata_asesi.id as id_asesi, biodata_asesi.nama, biodata_asesi.jenis_kelamin, skema_sertifikasi.id as id_skema, status_asesmen as asesmen, status_kelulusan FROM daftar_asesi_sertifikasi JOIN biodata_asesi ON daftar_asesi_sertifikasi.id_biodata_asesi = biodata_asesi.id JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id WHERE skema_sertifikasi.id =:id LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind('id', $idSkema);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function fetchDokumenAsesi($idAsesi)
  {
    $query = "SELECT id_unit_kompetensi as id, file_asesmen as file FROM dokumen_asesmen WHERE id_biodata_asesi =:id ORDER BY id_unit_kompetensi";
    $this->db->query($query);
    $this->db->bind("id", $idAsesi);
    return $this->db->resultSet();
  }

  public function addPenilaianAsesi($data)
  {
    $idKompetensi = $data[0];
    $idAsesi = $data[1];
    $nilai = $data[2];
    $query = "INSERT INTO penilaian_asesmen VALUES('', :idKompetensi, :idAsesi, :nilai)";
    $this->db->query($query);
    $this->db->bind("idKompetensi", $idKompetensi);
    $this->db->bind("idAsesi", $idAsesi);
    $this->db->bind("nilai", $nilai);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function updatePenilaianAsesi($data)
  {
    $idKompetensi = $data[0];
    $idAsesi = $data[1];
    $nilai = $data[2];
    $query = "UPDATE penilaian_asesmen SET nilai=:nilai WHERE id_kompetensi =:idKompetensi AND id_biodata_asesi =:idAsesi";
    $this->db->query($query);
    $this->db->bind("idKompetensi", $idKompetensi);
    $this->db->bind("idAsesi", $idAsesi);
    $this->db->bind("nilai", $nilai);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function amountAsesiByAsesor()
  {
    $id = $this->getIDByUsernameLogin();
    $query = "SELECT COUNT(*) as jumlah FROM daftar_asesi_sertifikasi JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id WHERE skema_sertifikasi.id_biodata_asesor =:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function amountSkemaByAsesor()
  {
    $id = $this->getIDByUsernameLogin();
    $query = "SELECT COUNT(*) as jumlah FROM skema_sertifikasi WHERE id_biodata_asesor=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function amountKompetensiByAsesor()
  {
    $id = $this->getIDByUsernameLogin();
    $query = "SELECT COUNT(*) as jumlah FROM unit_kompetensi JOIN skema_sertifikasi ON unit_kompetensi.id_skema = skema_sertifikasi.id WHERE skema_sertifikasi.id_biodata_asesor =:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function amountAsesmen($idSkema)
  {
    $query = "SELECT COUNT(*) as jumlah FROM unit_kompetensi WHERE id_skema =:id AND file_opsional IS NOT null";
    $this->db->query($query);
    $this->db->bind("id", $idSkema);
    return $this->db->single();
  }

  public function amountAsesmenByAsesi($idAsesi)
  {
    $query = "SELECT COUNT(*) as jumlah FROM dokumen_asesmen WHERE id_biodata_asesi =:id";
    $this->db->query($query);
    $this->db->bind("id", $idAsesi);
    return $this->db->single();
  }
}
