<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datart_model extends CI_Model{
   public function get_daftar_rt()
   {
      $this->db->select('*');
      $this->db->from('rt_view');
      return $this->db->get();
   }

   public function get_rt($id_dusun)
   {
      $this->db->select('data_rt.*');
      $this->db->from('data_rt');
      $this->db->join('dusun','data_rt.id_dusun = dusun.id_dusun');
      $this->db->where('dusun.id_dusun', $id_dusun);
      return $this->db->get();
   }
}