<?php
class Skema_model {
  private $db;
  public function __construct() {
    $this->db = new Database;
  }

  public function fetchAllSkema() {
    $query = "SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor, asesor.username as username_asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id JOIN asesor ON biodata_asesor.id = asesor.id_biodata_asesor  ORDER BY skema_sertifikasi.id ASC";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function fetchAllSkemaPagination($page) {
    $query = "SELECT skema_sertifikasi.id, nama_skema, skkni, status, level, jurusan.nama as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id ORDER BY skema_sertifikasi.id ASC LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function addSkema($data) {
    // $idSkkni = $this->getIdSKKNI($data['SKKNI'])['id'];
    $skema = htmlspecialchars($data['skema']);
    $idJurusan = htmlspecialchars($data['jurusan']);
    $idAsesor = htmlspecialchars($data['asesor']);
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

  public function updateStatus($id, $status) {
    $query = "UPDATE skema_sertifikasi SET status =:status WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("status", $status);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function getSingleSkema($id) {
    $query = "SELECT nama_skema, skkni, level, status, jurusan.nama as jurusan, jurusan.id as id_jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id WHERE skema_sertifikasi.id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    // $this->db->bind("nama", $nama);
    // $this->db->bind("level", $level);
    return $this->db->single();
  }

  public function fetchAllSKKNI() {
    $query = "SELECT skkni FROM skkni";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function fetchAllJurusan() {
    $query = "SELECT nama FROM jurusan";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getIdJurusan($nama) {
    $query = "SELECT id FROM jurusan WHERE nama=:nama";
    $this->db->query($query);
    $this->db->bind("nama", $nama);
    return $this->db->single();
  }

  public function fetchAllAsesor() {
    $query = "SELECT nama FROM biodata_asesor";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function fetchAllAsesiBySkema($idSkema) {
    $query = "SELECT biodata_asesi.id as id, biodata_asesi.nama as nama, daftar_asesi_sertifikasi.status_kelulusan as status_kelulusan FROM daftar_asesi_sertifikasi JOIN biodata_asesi ON daftar_asesi_sertifikasi.id_biodata_asesi = biodata_asesi.id WHERE daftar_asesi_sertifikasi.id_skema_sertifikasi =:idSkema";
    $this->db->query($query);
    $this->db->bind("idSkema", $idSkema);
    return $this->db->resultSet();
  }

  public function getIdAsesor($nama) {
    $query = "SELECT id FROM biodata_asesor WHERE nama=:nama";
    $this->db->query($query);
    $this->db->bind("nama", $nama);
    return $this->db->single();
  }

  public function getIdSKKNI($skkni) {
    $query = "SELECT id FROM skkni WHERE skkni LIKE ':skkni'";
    $this->db->query($query);
    $this->db->bind("%skkni%", $skkni);
    return $this->db->single();
  }

  public function updateSkema($id, $data) {
    // $idSkkni = $this->getIdSKKNI($data['SKKNI'])['id'];
    $skema = htmlspecialchars($data['skema']);
    $idJurusan = $this->getIdJurusan($data['jurusan'])['id'];
    $idAsesor = $this->getIdAsesor($data['asesor'])['id'];
    $query = "UPDATE skema_sertifikasi SET nama_skema=:nama, skkni=:skkni, level=:level, id_biodata_asesor=:id_asesor, id_jurusan=:id_jurusan, status=:status WHERE id=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("nama", $skema);
    $this->db->bind("skkni", $data['SKKNI']);
    $this->db->bind("level", $data['level']);
    $this->db->bind("id_asesor", $idAsesor);
    $this->db->bind("status", $data['status']);
    $this->db->bind("id_jurusan", $idJurusan);
    try {
      $this->db->execute();
      return $this->db->rowChangeCheck();
    } catch (\Throwable $th) {
      Flasher::setFlash("Harap ganti level dari skemanya", 'warning');
    }
  }

  public function filterSkemaByKategori($data) {
    $query_where = "";

    if (isset($data['id-jurusan'])) {
      $query_where .= " WHERE id_jurusan=:id_jurusan";
    }

    if (isset($data['level'])) {
      $query_where .= (isset($data['id-jurusan']) ? " AND" : " WHERE") . " skema_sertifikasi.level=:level";
    }

    if (isset($data['status'])) {
      $query_where .= (isset($data['id-jurusan']) || isset($data['level']) ? " AND" : " WHERE") . " skema_sertifikasi.status=:status";
    }

    $query_select = "SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id ";

    $this->db->query($query_select . $query_where . " ORDER BY skema_sertifikasi.id ASC");

    if (isset($data['id-jurusan'])) {
      $this->db->bind('id_jurusan', $data['id-jurusan']);
    }

    if (isset($data['level'])) {
      $this->db->bind('level', $data['level']);
    }

    if (isset($data['status'])) {
      $this->db->bind('status', $data['status']);
    }

    return $this->db->resultSet();
  }

  public function filterSkemaByKategoriOfJurusan($data, $id_jurusan) {
    $query_where = "";

    $query_where .= " WHERE skema_sertifikasi.id_jurusan=:id_jurusan";

    if (isset($data['level'])) {
      $query_where .= " AND skema_sertifikasi.level=:level";
    }

    if (isset($data['status'])) {
      $query_where .= " AND skema_sertifikasi.status=:status";
    }

    $query_select = "SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id ";

    $this->db->query($query_select . $query_where . " ORDER BY skema_sertifikasi.id ASC");

    $this->db->bind('id_jurusan', $id_jurusan);

    if (isset($data['level'])) {
      $this->db->bind('level', $data['level']);
    }

    if (isset($data['status'])) {
      $this->db->bind('status', $data['status']);
    }

    return $this->db->resultSet();
  }

  public function getTotalAsesiInSkema($id_skema) {
    $this->db->query("SELECT * FROM daftar_asesi_sertifikasi WHERE id_skema_sertifikasi=:id_skema");
    $this->db->bind("id_skema", $id_skema);

    return count($this->db->resultSet());
  }

  public function searchDataSkema($keyword) {
    // $idSkkni = $this->getIdSKKNI($keyword)['id'];

    $query = "SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id WHERE nama_skema LIKE :word OR skkni LIKE :word OR status LIKE :word OR jurusan.nama LIKE :word OR biodata_asesor.nama LIKE :word ORDER BY skema_sertifikasi.id ASC";
    $this->db->query($query);
    $this->db->bind("word", "%" . $keyword . "%");
    // $this->db->bind("'%status%'", $keyword);
    // $this->db->bind("'%skkni%'", $keyword);
    return $this->db->resultSet();
  }

  public function searchDataSkemaOfAsesi($keyword, $id_jurusan) {
    // $idSkkni = $this->getIdSKKNI($keyword)['id'];

    $query = "SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id WHERE skema_sertifikasi.id_jurusan=:id_jurusan AND nama_skema LIKE :word OR skkni LIKE :word OR status LIKE :word OR jurusan.nama LIKE :word OR biodata_asesor.nama LIKE :word ORDER BY skema_sertifikasi.id ASC";
    $this->db->query($query);
    $this->db->bind("word", "%" . $keyword . "%");
    $this->db->bind("id_jurusan", $id_jurusan);
    // $this->db->bind("'%status%'", $keyword);
    // $this->db->bind("'%skkni%'", $keyword);
    return $this->db->resultSet();
  }

  public function countAsesiRegistered($id) {
    $query = "SELECT COUNT(*) as jumlah from daftar_asesi_sertifikasi WHERE id_skema_sertifikasi =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function countAsesiAssessed($id) {
    $query = "SELECT COUNT(*) as jumlah from daftar_asesi_sertifikasi WHERE id_skema_sertifikasi =:id AND status_asesmen =:status";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->bind("status", "Sudah");
    return $this->db->single();
  }

  public function countKompetensiByID($id) {
    $query = "SELECT COUNT(*) as jumlah FROM unit_kompetensi WHERE id_skema=:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  // Unit Kompetensi

  public function fetchAllUnitKompetensi($page) {
    $query = "SELECT unit_kompetensi.id as id_kompetensi, nama_kompetensi, jenis_pelaksanaan, date_format(tgl_ujian_kompetensi, '%d %M %Y') as tanggal, tempat_unit_kompetensi as tempat, jam_mulai, jam_akhir,skema_sertifikasi.nama_skema, skema_sertifikasi.level, skema_sertifikasi.id as id_skema FROM unit_kompetensi JOIN skema_sertifikasi ON unit_kompetensi.id_skema = skema_sertifikasi.id ORDER BY skema_sertifikasi.id ASC LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function getTotalAsesmen() {
    $this->db->query("SELECT * FROM unit_kompetensi");
    return count($this->db->resultSet());
  }

  public function getTotalAsesmenOfAsesi() {
    $id_bio = $this->getIdBiodata($_SESSION['username']);
    $skema_asesi = $this->getSkemaAsesi($id_bio);

    $total_asesmen = 0;
    foreach ($skema_asesi as $skema) {
      $this->db->query("SELECT * FROM unit_kompetensi WHERE id_skema=:id_skema");
      $this->db->bind("id_skema", $skema['id']);

      $total_asesmen += count($this->db->resultSet());
    }
    return $total_asesmen;
  }

  public function fetchAllAsesmenByIdSkema($id_skema) {
    $this->db->query("SELECT * FROM unit_kompetensi WHERE id_skema=:id");
    $this->db->bind("id", $id_skema);
    return count($this->db->resultSet());
  }

  public function searchDataUnitKompetensi($page, $keyword) {
    // $idSkkni = $this->getIdSKKNI($keyword)['id'];

    $query = "SELECT unit_kompetensi.id as id_kompetensi, nama_kompetensi, jenis_pelaksanaan, date_format(tgl_ujian_kompetensi, '%d %M %Y') as tanggal, tempat_unit_kompetensi as tempat, jam_mulai, jam_akhir, skema_sertifikasi.nama_skema, skema_sertifikasi.level, skema_sertifikasi.id as id_skema FROM unit_kompetensi JOIN skema_sertifikasi ON unit_kompetensi.id_skema = skema_sertifikasi.id WHERE nama_kompetensi LIKE :word OR skema_sertifikasi.nama_skema LIKE :word ORDER BY skema_sertifikasi.id ASC";
    $this->db->query($query);
    $this->db->bind("word", "%" . $keyword . "%");
    // $this->db->bind("'%status%'", $keyword);
    // $this->db->bind("'%skkni%'", $keyword);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }

  public function getKompetensiByIdSkema($id) {
    $query = "SELECT * FROM unit_kompetensi WHERE id_skema =:id ORDER BY nama_kompetensi";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->resultSet();
  }

  public function getKompetensiByIdKompetensi($id) {
    $query = "SELECT * FROM unit_kompetensi WHERE id =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function deleteKompetensiById($id) {
    $query = "DELETE FROM unit_kompetensi WHERE id =:id";
    $this->db->query($query);
    $this->db->bind("id", $id);
    $this->db->execute();
    return $this->db->rowChangeCheck();
  }

  public function isKompetensiExist($id) {
    $this->db->query("SELECT * FROM unit_kompetensi WHERE id=:id");
    $this->db->bind("id", $id);

    return count($this->db->resultSet());
  }

  public function isSkemaExist($id) {
    $this->db->query("SELECT * FROM skema_sertifikasi WHERE id=:id");
    $this->db->bind("id", $id);

    return count($this->db->resultSet());
  }

  public function updateKompetensi($id, $data) {
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
  public function addKompetensi($idSkema, $data) {
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

  public function lastCreated5() {
    $last5 = count($this->fetchAllSkema()) - 4;
    $query = "SELECT * FROM skema_sertifikasi LIMIT $last5, 5";
    $this->db->query($query);
    return $this->db->resultSet();
  }


  public function fetchAllSchema($status, $page) {

    $query = "SELECT * FROM skema_sertifikasi WHERE status=:status LIMIT :page, 5";

    $this->db->query($query);
    $this->db->bind("status", $status);
    $this->db->bind("page", 5 * ($page - 1));

    return $this->db->resultSet();
  }

  public function getSkemaById($id) {

    $query = "SELECT * FROM skema_sertifikasi WHERE id=:id";

    $this->db->query($query);
    $this->db->bind("id", $id);

    return $this->db->single();
  }

  public function getDataSkemaById($id_skema, $table) {

    $query = "SELECT * FROM " . $table . " WHERE id_skema=:id_skema";

    $this->db->query($query);
    $this->db->bind('id_skema', $id_skema);

    return $this->db->resultSet();
  }

  public function getTotalData($id_skema, $table) {

    $query = "SELECT * FROM " . $table . " WHERE id_skema=:id_skema";

    $this->db->query($query);
    $this->db->bind("id_skema", $id_skema);

    return count($this->db->resultSet());
  }

  public function searchSkema($page) {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM skema_sertifikasi WHERE nama_skema LIKE :keyword LIMIT :page, 5";

    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind("page", 5 * ($page - 1));

    return $this->db->resultSet();
  }

  public function getIdBiodata($username) {

    $query = "SELECT id_biodata_asesi FROM asesi WHERE username =:username";

    $this->db->query($query);
    $this->db->bind('username', $username);
    return $this->db->single()['id_biodata_asesi'];
  }

  public function getTotalSchema() {
    $this->db->query("SELECT * FROM skema_sertifikasi");
    return count($this->db->resultSet());
  }

  public function getTotalUpload() {

    $idBio = $this->getIdBiodata($_SESSION['username']);

    $query = "SELECT file_dokumen FROM dokumen_persyaratan WHERE id_biodata_asesi = :id_biodata_asesi";

    $this->db->query($query);
    $this->db->bind('id_biodata_asesi', $idBio);

    return count($this->db->resultSet());
  }

  public function getSkemaAsesi($id_bio) {

    $query = "SELECT skema_sertifikasi.id, skema_sertifikasi.nama_skema FROM daftar_asesi_sertifikasi
                      JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi=skema_sertifikasi.id WHERE daftar_asesi_sertifikasi.id_biodata_asesi=:id_bio";

    $this->db->query($query);
    $this->db->bind("id_bio", $id_bio);

    return $this->db->resultSet();
  }


  public function searchSkemaAsesi($page) {
    $keyword = $_POST['keyword'];
    $query = "SELECT skema_sertifikasi.id, skema_sertifikasi.nama_skema FROM daftar_asesi_sertifikasi
                      JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi=skema_sertifikasi.id 
                      WHERE nama_skema LIKE :keyword LIMIT :page, 5";

    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind("page", 5 * ($page - 1));

    return $this->db->resultSet();
  }

  public function checkRegistSkema($data) {
    $idBio = $this->getIdBiodata($_SESSION['username']);

    $query = "SELECT id_skema_sertifikasi FROM daftar_asesi_sertifikasi WHERE id_biodata_asesi=:id_biodata_asesi AND id_skema_sertifikasi = :id_skema_sertifikasi";

    $this->db->query($query);
    $this->db->bind('id_biodata_asesi', $idBio);
    $this->db->bind('id_skema_sertifikasi', $data);

    return count($this->db->resultSet());
  }

  public function registSkema($data) {

    $idBio = $this->getIdBiodata($_SESSION['username']);

    $query = "INSERT INTO daftar_asesi_sertifikasi SET id_biodata_asesi=:id_biodata_asesi, id_skema_sertifikasi = :id_skema_sertifikasi";

    $this->db->query($query);
    $this->db->bind('id_biodata_asesi', $idBio);
    $this->db->bind('id_skema_sertifikasi', $data);

    $this->db->execute();

    return $this->db->rowChangeCheck();
  }

  public function getScheduleSkema($page) {

    $idBio = $this->getIdBiodata($_SESSION['username']);

    $query = "SELECT unit_kompetensi.id, unit_kompetensi.jenis_pelaksanaan, unit_kompetensi.nama_kompetensi, unit_kompetensi.id_skema, skema_sertifikasi.nama_skema, biodata_asesor.nama, 
                        unit_kompetensi.tgl_ujian_kompetensi as tanggal, unit_kompetensi.jam_mulai, unit_kompetensi.jam_akhir, skema_sertifikasi.level as level,
                        unit_kompetensi.tempat_unit_kompetensi FROM daftar_asesi_sertifikasi      
                        JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id
                        JOIN unit_kompetensi ON skema_sertifikasi.id = unit_kompetensi.id_skema
                        JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id 
                        WHERE daftar_asesi_sertifikasi.id_biodata_asesi =:id_biodata_asesi LIMIT :page, 5";

    $this->db->query($query);
    $this->db->bind('id_biodata_asesi', $idBio);
    $this->db->bind("page", 5 * ($page - 1));

    return $this->db->resultSet();
  }

  public function getScheduleSchemaOfAsesor($page, $id_bio) {

    $query = "SELECT unit_kompetensi.id, unit_kompetensi.jenis_pelaksanaan, unit_kompetensi.nama_kompetensi, unit_kompetensi.id_skema, skema_sertifikasi.nama_skema, biodata_asesor.nama, 
                        unit_kompetensi.tgl_ujian_kompetensi as tanggal, unit_kompetensi.jam_mulai, unit_kompetensi.jam_akhir, skema_sertifikasi.level as level,
                        unit_kompetensi.tempat_unit_kompetensi FROM daftar_asesi_sertifikasi      
                        JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id
                        JOIN unit_kompetensi ON skema_sertifikasi.id = unit_kompetensi.id_skema
                        JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id 
                        WHERE biodata_asesor.id=:id_bio LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind('id_bio', $id_bio);
    $this->db->bind("page", 5 * ($page - 1));

    return $this->db->resultSet();
  }

  public function getScheduleSchemaAsesor($id_bio) {
    $query = "SELECT unit_kompetensi.id, unit_kompetensi.jenis_pelaksanaan, unit_kompetensi.nama_kompetensi, unit_kompetensi.id_skema, skema_sertifikasi.nama_skema, unit_kompetensi.file_opsional, biodata_asesor.nama, 
                        unit_kompetensi.tgl_ujian_kompetensi as tanggal, unit_kompetensi.jam_mulai, unit_kompetensi.jam_akhir, skema_sertifikasi.level as level,
                        unit_kompetensi.tempat_unit_kompetensi FROM daftar_asesi_sertifikasi      
                        JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id
                        JOIN unit_kompetensi ON skema_sertifikasi.id = unit_kompetensi.id_skema
                        JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id 
                        WHERE biodata_asesor.id=:id_bio";
    $this->db->query($query);
    $this->db->bind('id_bio', $id_bio);
    return $this->db->resultSet();
  }

  public function searchJadwal($page) {
    $keyword = $_POST['keyword'];
    $query = "SELECT DiSTINCT unit_kompetensi.id, unit_kompetensi.jenis_pelaksanaan, unit_kompetensi.nama_kompetensi, skema_sertifikasi.nama_skema, biodata_asesor.nama, 
                      unit_kompetensi.tgl_ujian_kompetensi, unit_kompetensi.jam_mulai, unit_kompetensi.jam_akhir, 
                      unit_kompetensi.tempat_unit_kompetensi FROM daftar_asesi_sertifikasi      
                      JOIN skema_sertifikasi ON daftar_asesi_sertifikasi.id_skema_sertifikasi = skema_sertifikasi.id
                      JOIN unit_kompetensi ON skema_sertifikasi.id = unit_kompetensi.id_skema
                      JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id 
                      WHERE nama_kompetensi LIKE :keyword LIMIT :page, 5";

    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind("page", 5 * ($page - 1));

    return $this->db->resultSet();
  }

  public function getSchemaOfAsesi($id) {
    $this->db->query("SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id JOIN daftar_asesi_sertifikasi ON skema_sertifikasi.id = daftar_asesi_sertifikasi.id_skema_sertifikasi WHERE daftar_asesi_sertifikasi.id_biodata_asesi=:id ORDER BY skema_sertifikasi.id ASC");

    $this->db->bind("id", $id);

    return $this->db->resultSet();
  }

  public function getSchemaOfAsesor($id) {
    $this->db->query("SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id WHERE skema_sertifikasi.id_biodata_asesor=:id ORDER BY skema_sertifikasi.id ASC");

    $this->db->bind("id", $id);

    return $this->db->resultSet();
  }

  public function fetchThreeLastCreatedSchema() {
    $this->db->query("SELECT * FROM skema_sertifikasi ORDER BY id DESC LIMIT 3");

    return $this->db->resultSet();
  }

  public function fetchThreeLastCreatedSchemaOfJurusan($id_jurusan) {
    $this->db->query("SELECT * FROM skema_sertifikasi WHERE id_jurusan=:id_jurusan ORDER BY id DESC LIMIT 3");
    $this->db->bind("id_jurusan", $id_jurusan);

    return $this->db->resultSet();
  }

  public function deleteSKemaById($id) {
    $this->db->query("DELETE FROM skema_sertifikasi WHERE id=:id");
    $this->db->bind("id", $id);
    $this->db->execute();

    return $this->db->rowChangeCheck();
  }

  public function getSchemaOfJurusan($id_jurusan) {
    $this->db->query("SELECT skema_sertifikasi.id, id_jurusan, nama_skema, skkni, status, level, jurusan.singkatan as jurusan, biodata_asesor.nama as asesor FROM skema_sertifikasi JOIN jurusan ON skema_sertifikasi.id_jurusan = jurusan.id JOIN biodata_asesor ON skema_sertifikasi.id_biodata_asesor = biodata_asesor.id WHERE skema_sertifikasi.id_jurusan=:id ORDER BY skema_sertifikasi.id ASC");

    $this->db->bind("id", $id_jurusan);

    return $this->db->resultSet();
  }
}