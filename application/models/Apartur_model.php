<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartur_model extends CI_Model {
     public function get_apartur()
     {
          $this->db->select('*');
          $this->db->from('apartur_desa');
          return $this->db->get();
     }
     
}
