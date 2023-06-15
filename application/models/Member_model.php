<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
  private $_table = 'user';

  public function get($limit, $start, $where)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where($where);
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_count()
  {
    return $this->db->count_all($this->_table);
  }
}