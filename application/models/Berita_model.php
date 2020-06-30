<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
     public function get_berita()
     {
          $this->db->select('*');
          $this->db->from('berita');
          $this->db->order_by('tanggal', 'DESC');
          return $this->db->get();
     }

     public function get_berita_home()
     {
          $this->db->select('*');
          $this->db->from('berita');
          $this->db->limit(5);
          $this->db->order_by('tanggal', 'DESC');
          return $this->db->get();
     }
     public function insert_data($arr_input)
     {
          $this->db->insert('berita', $arr_input);
     }

     public function update_data($id, $data)
     {
          $this->db->where('id', $id);
          $this->db->update('berita', $data);
     }

     public function get_idadmin()
     {
          $this->db->select('id_admin');
          $this->db->from('admin');
          return $this->db->get();
     }
}
