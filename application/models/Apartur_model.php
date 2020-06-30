<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartur_model extends CI_Model {
     public function get_apartur()
     {
          $this->db->select('*');
          $this->db->from('apartur_desa');
          return $this->db->get();
     }
     public function insert_data($data)
     {
          $this->db->insert('apartur_desa', $data);
     }

     public function get_by_id($id_apartur)
     {
          $this->db->select('*');
          $this->db->from('apartur_desa');
          $this->db->where('id_apartur', $id_apartur);
          return $this->db->get();
     }

     public function update_data($id_apartur, $data)
     {
          $this->db->where('id_apartur', $id_apartur);
          $this->db->update('apartur_desa', $data);
     }

     public function delete_data($id_apartur)
     {
          $this->db->where('id_apartur', $id_apartur);
          $this->db->delete('apartur_desa');
     }

     public function cari_data($query)
     {
          $this->db->select('*');
          $this->db->from('apartur_desa');

          if ($query != '') {
               $this->db->like('nama', $query);
               $this->db->or_like('jabatan', $query);
          }
          $this->db->order_by('id_apartur', 'ASC');
          return $this->db->get();
     }
}
