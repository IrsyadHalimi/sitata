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
  public function get_count()
  {
    return $this->db->count_all($this->_table);
  }

  public function get_by_id($category_id)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where($category_id);
    $query = $this->db->get();
    return $query->result();
  }
  
  public function detail($where)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('kategori', 'kategori.id_kategori=berita.id_kategori');
    $query = $this->db->where($where);
    $query = $this->db->get();
    return $query->row_array();
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

  public function preview($id)
  {
    if (!$id) {
      return;
    }
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

  public function get_recent_news($news_order_by, $news_limit)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->order_by($news_order_by, 'DESC');
    $this->db->limit($news_limit);
    $query = $this->db->get();
    return $query->result();
  }
  
  public function delete_category($id)
  {
    if (!$id) {
      return;
    }

    return $this->db->delete($this->_table, ['id_kategori' => $id]);
  }
}