<?php
class Skema_model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function fetchAllSkema()
  {
    $query = "SELECT skema_sertifikasi.id, nama_skema, skkni, status, level, jurusan.nama as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id ORDER BY skema_sertifikasi.id ASC";
    $this->db->query($query);
    // $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function fetchAllSkemaPagination($page)
  {
    $query = "SELECT skema_sertifikasi.id, nama_skema, skkni, status, level, jurusan.nama as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id ORDER BY skema_sertifikasi.id ASC LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function addSkema($data)
  {
    // $idSkkni = $this->getIdSKKNI($data['SKKNI'])['id'];
    $skema = htmlspecialchars($data['skema']);
    $idJurusan = $this->getIdJurusan($data['jurusan'])['id'];
    $idAsesor = $this->getIdAsesor($data['asesor'])['id'];
    $query = "INSERT INTO skema_sertifikasi VALUES ('', :nama, :skkni, :status, :level, :id_asesor, :id_jurusan)";
    $this->db->query($query);
    $this->db->bind("nama", $skema);
    $this->db->bind("skkni", $data['SKKNI']);
    $this->db->bind("level", $data['level']);
    $this->db->bind("status", $data['status']);
    $this->db->bind("id_asesor", $idAsesor);
    $this->db->bind("id_jurusan", $idJurusan);
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

  public function getSingleSkema($id)
  {
    $query = "SELECT nama_skema, skkni, level, jurusan.nama as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id WHERE skema_sertifikasi.id =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    // $this->db->bind("nama", $nama);
    // $this->db->bind("level", $level);
    return $this->db->single();
  }

  public function fetchAllSKKNI()
  {
    $query = "SELECT skkni FROM skkni";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function fetchAllJurusan()
  {
    $query = "SELECT nama FROM jurusan";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getIdJurusan($nama)
  {
    $query = "SELECT id FROM jurusan WHERE nama=:nama";
    $this->db->query($query);
    $this->db->bind("nama", $nama);
    return $this->db->single();
  }

  public function fetchAllAsesor()
  {
    $query = "SELECT nama FROM biodata_asesor";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function fetchAllAsesiBySkema($idSkema)
  {
    $query = "SELECT biodata_asesi.nama as nama FROM daftar_asesi_sertifikasi JOIN biodata_asesi ON daftar_asesi_sertifikasi.id_biodata_asesi = biodata_asesi.id WHERE daftar_asesi_sertifikasi.id_skema_sertifikasi =:idSkema";
    $this->db->query($query);
    $this->db->bind("idSkema", $idSkema);
    return $this->db->resultSet();
  }

  public function getIdAsesor($nama)
  {
    $query = "SELECT id FROM biodata_asesor WHERE nama=:nama";
    $this->db->query($query);
    $this->db->bind("nama", $nama);
    return $this->db->single();
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
    $idJurusan = $this->getIdJurusan($data['jurusan'])['id'];
    $idAsesor = $this->getIdAsesor($data['asesor'])['id'];
    $query = "UPDATE skema_sertifikasi SET nama_skema=:nama, skkni=:skkni, level=:level, id_biodata_asesor=:id_asesor, id_jurusan=:id_jurusan WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("nama", $skema);
    $this->db->bind("skkni", $data['SKKNI']);
    $this->db->bind("level", $data['level']);
    $this->db->bind("id_asesor", $idAsesor);
    $this->db->bind("id_jurusan", $idJurusan);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
    }
  }

  public function searchDataSkema($page, $keyword)
  {
    // $idSkkni = $this->getIdSKKNI($keyword)['id'];

    $query = "SELECT skema_sertifikasi.id, nama_skema, skkni, status, level, jurusan.nama as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id WHERE nama_skema LIKE :word OR skkni LIKE :word OR status LIKE :word OR jurusan.nama LIKE :word OR biodata_asesor.nama LIKE :word ORDER BY skema_sertifikasi.id ASC";
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

  public function fetchAllUnitKompetensi($page)
  {
    $query = "SELECT unit_kompetensi.id as id_kompetensi, nama_kompetensi, jenis_pelaksanaan, date_format(tgl_ujian_kompetensi, '%d %M %Y') as tanggal, tempat_unit_kompetensi as tempat, jam_mulai, jam_akhir,skema_sertifikasi.nama_skema, skema_sertifikasi.level, skema_sertifikasi.id as id_skema FROM unit_kompetensi JOIN skema_sertifikasi ON unit_kompetensi.id_skema = skema_sertifikasi.id ORDER BY skema_sertifikasi.id ASC LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function searchDataUnitKompetensi($page, $keyword)
  {
    // $idSkkni = $this->getIdSKKNI($keyword)['id'];

    $query = "SELECT unit_kompetensi.id as id_kompetensi, nama_kompetensi, jenis_pelaksanaan, date_format(tgl_ujian_kompetensi, '%d %M %Y') as tanggal, tempat_unit_kompetensi as tempat, jam_mulai, jam_akhir, skema_sertifikasi.nama_skema, skema_sertifikasi.level, skema_sertifikasi.id as id_skema FROM unit_kompetensi JOIN skema_sertifikasi ON unit_kompetensi.id_skema = skema_sertifikasi.id WHERE nama_kompetensi LIKE :word OR skema_sertifikasi.nama_skema LIKE :word ORDER BY skema_sertifikasi.id ASC";
    $this->db->query($query);
    $this->db->bind("word", "%" . $keyword . "%");
    // $this->db->bind("'%status%'", $keyword);
    // $this->db->bind("'%skkni%'", $keyword);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

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
    $query = "UPDATE unit_kompetensi SET nama_kompetensi=:nama, tgl_ujian_kompetensi=:tgl, jenis_pelaksanaan=:jns, tempat_unit_kompetensi=:tempat, jam_mulai=:jm, jam_akhir=:ja, file_opsional=:file WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("nama", $nama);
    $this->db->bind("tempat", $tempat);
    $this->db->bind("tgl", $data['tgl-kompetensi']);
    $this->db->bind("jns", $data['pelaksanaan']);
    $this->db->bind("jm", $data['jam-mulai']);
    $this->db->bind("ja", $data['jam-akhir']);
    $this->db->bind("file", $data['soal-kompetensi']);
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
    $query = "INSERT INTO unit_kompetensi VALUES ('', :nama, :tgl, :jns, :tempat, :jm, :ja, :file, :id)";
    $this->db->query($query);
    $this->db->bind("id", $idSkema);
    $this->db->bind("nama", $nama);
    $this->db->bind("tempat", $tempat);
    $this->db->bind("tgl", $data['tgl-kompetensi']);
    $this->db->bind("jns", $data['pelaksanaan']);
    $this->db->bind("jm", $data['jam-mulai']);
    $this->db->bind("ja", $data['jam-akhir']);
    $this->db->bind("file", $data['soal-kompetensi']);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      // Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
    }
  }

  public function lastCreated5()
  {
    $last5 = count($this->fetchAllSkema()) - 4;
    $query = "SELECT * FROM skema_sertifikasi LIMIT $last5, 5";
    $this->db->query($query);
    return $this->db->resultSet();
  }
}
