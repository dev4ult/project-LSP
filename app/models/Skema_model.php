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
    $query = "SELECT skema_sertifikasi.id, nama_skema, skkni, status, level FROM skema_sertifikasi ORDER BY skema_sertifikasi.id ASC LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function addSkema($data)
  {
    // $idSkkni = $this->getIdSKKNI($data['SKKNI'])['id'];
    $skema = htmlspecialchars($data['skema']);
    $query = "INSERT INTO skema_sertifikasi(id, nama_skema, skkni, status, level) VALUES ('', :nama, :skkni, 'Aktif', :level)";
    $this->db->query($query);
    $this->db->bind("nama", $skema);
    $this->db->bind("skkni", $data['SKKNI']);
    $this->db->bind("level", $data['level']);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
    }
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

  public function getSingleSkema($nama, $level)
  {
    $query = "SELECT skema_sertifikasi.id as id_skema, nama_skema, skkni, level FROM skema_sertifikasi WHERE skema_sertifikasi.nama_skema=:nama AND skema_sertifikasi.level=:level";
    $this->db->query($query);
    $this->db->bind("nama", $nama);
    $this->db->bind("level", $level);
    return $this->db->single();
  }

  public function fetchAllSKKNI()
  {
    $query = "SELECT skkni FROM skkni";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getIdSKKNI($skkni)
  {
    $query = "SELECT id FROM skkni WHERE skkni LIKE ':skkni'";
    $this->db->query($query);
    $this->db->bind("%skkni%", $skkni);
    return $this->db->single();
  }

  public function updateSkema($id, $data)
  {
    // $idSkkni = $this->getIdSKKNI($data['SKKNI'])['id'];
    $skema = htmlspecialchars($data['skema']);
    $query = "UPDATE skema_sertifikasi SET nama_skema=:nama, skkni=:skkni, level=:level WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("nama", $skema);
    $this->db->bind("skkni", $data['SKKNI']);
    $this->db->bind("level", $data['level']);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
    }
  }

  public function searchData($page, $keyword)
  {
    // $idSkkni = $this->getIdSKKNI($keyword)['id'];

    $query = "SELECT skema_sertifikasi.id, nama_skema, skkni, status, level FROM skema_sertifikasi WHERE nama_skema LIKE :word OR skkni LIKE :word OR status LIKE :word ORDER BY skema_sertifikasi.id ASC LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("word", "%" . $keyword . "%");
    // $this->db->bind("'%status%'", $keyword);
    // $this->db->bind("'%skkni%'", $keyword);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function countAsesiRegistered($id)
  {
    $query = "SELECT COUNT(*) as jumlah from daftar_asesi_sertifikasi WHERE id_skema_sertifikasi =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function countAsesiAssessed($id)
  {
    $query = "SELECT COUNT(*) as jumlah from daftar_asesi_sertifikasi WHERE id_skema_sertifikasi =:id AND status_asesmen =:status";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("status", "Sudah");
    return $this->db->single();
  }

  public function countKompetensiByID($id)
  {
    $query = "SELECT COUNT(*) as jumlah FROM unit_kompetensi WHERE id_skema=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  // Unit Kompetensi
  public function getKompetensiByIdSkema($id)
  {
    $query = "SELECT * FROM unit_kompetensi WHERE id_skema =:id ORDER BY nama_kompetensi";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->resultSet();
  }

  public function getKompetensiByIdKompetensi($id)
  {
    $query = "SELECT * FROM unit_kompetensi WHERE id =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function deleteKompetensiById($id)
  {
    $query = "DELETE FROM unit_kompetensi WHERE id =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function updateKompetensi($id, $data)
  {
    $nama = htmlspecialchars($data['nama-kompetensi']);
    $tempat = htmlspecialchars($data['tempat-kompetensi']);
    $query = "UPDATE unit_kompetensi SET nama_kompetensi=:nama, tgl_ujian_kompetensi=:tgl, jenis_pelaksanaan=:jns, tempat_unit_kompetensi=:tempat, jam_mulai=:jm, jam_akhir=:ja WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("nama", $nama);
    $this->db->bind("tempat", $tempat);
    $this->db->bind("tgl", $data['tgl-kompetensi']);
    $this->db->bind("jns", $data['pelaksanaan']);
    $this->db->bind("jm", $data['jam-mulai']);
    $this->db->bind("ja", $data['jam-akhir']);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      // Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
    }
  }
  public function addKompetensi($idSkema, $data)
  {
    $nama = htmlspecialchars($data['nama-kompetensi']);
    $tempat = htmlspecialchars($data['tempat-kompetensi']);
    $query = "INSERT INTO unit_kompetensi VALUES ('', :nama, :tgl, :jns, :tempat, :jm, :ja, NULL, :id)";
    $this->db->query($query);
    $this->db->bind("id", $idSkema);
    $this->db->bind("nama", $nama);
    $this->db->bind("tempat", $tempat);
    $this->db->bind("tgl", $data['tgl-kompetensi']);
    $this->db->bind("jns", $data['pelaksanaan']);
    $this->db->bind("jm", $data['jam-mulai']);
    $this->db->bind("ja", $data['jam-akhir']);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      // Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
    }
  }
}
