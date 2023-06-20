<?php defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{
  private $_table = 'berita';
  
  public function get_news($limit, $start)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori', 'left');
    $this->db->order_by('waktu_dibuat', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_count()
  {
    return $this->db->count_all($this->_table);
  }

  public function get_by_id($news_id)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where($news_id);
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

  public function insert($news)
  {
    return $this->db->insert($this->_table, $news);
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

    $query = array(
      $this->db->delete($this->_table, ['id_berita' => $id]),
      $this->db->delete('komentar', ['id_berita' => $id])
    );
    return $query;
  }

  public function get_category()
  {
    $query = $this->db->get('kategori');
    return $query->result();
  }

  public function get_popular_news($news_order_by, $news_limit)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('kategori', 'kategori.id_kategori=berita.id_kategori');
    $this->db->order_by($news_order_by, 'DESC');
    $this->db->limit($news_limit);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_recent_news($news_order_by, $news_limit)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('kategori', 'kategori.id_kategori=berita.id_kategori');
    $this->db->order_by($news_order_by, 'DESC');
    $this->db->limit($news_limit);
    $query = $this->db->get();
    return $query->result();
  }

  public function increment_view($idnews)
  {
    $this->db->where('id_berita', $idnews);
    $this->db->set('dilihat', 'dilihat+1', FALSE);
    $this->db->update($this->_table);
  }
  
}