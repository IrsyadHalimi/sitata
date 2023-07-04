<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
  private $_table = 'user';

  public function get($limit, $start)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where('role_id', 2);
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_count()
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where('role_id', 2);
    return $this->db->count_all_results();
  }

  public function delete($id)
  {
    if (!$id) {
      return;
    }

    $query = array(
      $this->db->delete($this->_table, ['id' => $id])
    );
    return $query;
  }
}