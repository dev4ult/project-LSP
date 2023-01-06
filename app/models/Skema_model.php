<?php
class Skema_model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function fetchAllSkema($status, $page)
  {
    $query = "SELECT id, nama_skema, skkni FROM skema_sertifikasi WHERE status=:status LIMIT :page, 5";
    $this->db->query($query);
    $this->db->bind("status", $status);
    $this->db->bind("page", 5 * ($page - 1));
    return $this->db->resultSet();
  }
}
