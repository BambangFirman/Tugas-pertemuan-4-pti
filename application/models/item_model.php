<?php
class Item_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  // Fungsi insert data ke t_model
  public function insert_item($data) {
    return $this->db->insert('t_model', $data);
  }

  // Fungsi menampilkan seluruh data dari t_model
  public function select_all() {
    $this->db->select('*');
    $this->db->from('t_model');
    $this->db->order_by('kd_model', 'desc');
    return $this->db->get();
  }

  /**
   * Fungsi menampilkan data berdasarkan kode model.
   * Fungsi ini digunakan untuk proses pencarian.
   */
  public function select_by_kode($kd_model) {
    $this->db->select('*');
    $this->db->from('t_model');
    $this->db->where("(LOWER(kd_model) LIKE '%{$kd_model}%' )");
    return $this->db->get();
  }

  public function select_by_id($kd_model) {
    $this->db->select('*');
    $this->db->from('t_model');
    $this->db->where('kd_model', $kd_model);
    return $this->db->get();
  }

  // Fungsi update data ke t_model
  public function update_item($kd_model, $data) {
    $this->db->where('kd_model', $kd_model);
    $this->db->update('t_model', $data);
  }

  // Fungsi delete data dari t_model
  public function delete_item($kd_model) {
    $this->db->where('kd_model', $kd_model);
    $this->db->delete('t_model');
  }

  // Fungsi yang digunakan oleh pagination sample
  public function select_all_paging($limit = array()) {
    $this->db->select('*');
    $this->db->from('t_model');

    if ($limit != NULL) {
      $this->db->limit($limit['perpage'], $limit['offset']);
    }

    return $this->db->get();
  }

  // Menghitung jumlah rows
  public function jumlah_item() {
    $this->db->select('*');
    $this->db->from('t_model');
    return $this->db->count_all_results();
  }

  public function eksport_data() {
    $this->db->select('kd_model, nama_model, deskripsi');
    $this->db->from('t_model');
    return $this->db->get();
  }

}
?>