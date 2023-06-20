<?php defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{
  private $_table = 'komentar';

  public function insert($comment)
  {
    return $this->db->insert($this->_table, $comment);
  }

  public function get_comment($idnews)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('user', 'user.id=komentar.id');
    $this->db->where('id_berita', $idnews);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_count()
  {
    return $this->db->count_all($this->_table);
  }

  public function get_recent_comment($comment_order_by, $comment_limit)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('user', 'user.id=komentar.id');
    $this->db->join('berita', 'berita.id_berita=komentar.id_berita');
    $this->db->order_by($comment_order_by, 'DESC');
    $this->db->limit($comment_limit);
    $query = $this->db->get();
    return $query->result();
  }

  public function get($limit, $start)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('user', 'user.id=komentar.id');
    $this->db->join('berita', 'berita.id_berita=komentar.id_berita');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  public function delete($id)
  {
    if (!$id) {
      return;
    }

    return $this->db->delete($this->_table, ['id_komentar' => $id]);
  }
}