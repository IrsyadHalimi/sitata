<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
  private $_table = 'kategori';
  
  public function get()
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $query = $this->db->get();
    return $query->result();
  }

  public function insert($category)
  {
    return $this->db->insert($this->_table, $category);
  }

  public function update($where, $data)
  {
    $this->db->where($where);       
    $this->db->update($this->_table, $data);
  }

  public function delete($id)
  {
    if (!$id) {
      return;
    }

    return $this->db->delete($this->_table, ['id_berita' => $id]);
  }

  public function get_category()
  {
    $query = $this->db->get('kategori');
    return $query->result();
  }

  public function delete_category($id)
  {
    if (!$id) {
      return;
    }

    return $this->db->delete($this->_table, ['id_kategori' => $id]);
  }

  public function get_by_id($id_category)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where($id_category);
    $query = $this->db->get();
    return $query->result();
  }
}