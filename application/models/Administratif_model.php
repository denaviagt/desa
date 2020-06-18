<?php 
define('BASEPATH') OR exit('No direct script access allowed');

class Administratif_model extends CI_Model
{
   public function get_administratif()
   {
      $this->db->select('nama_dsn, kepala_dkh');
      $this->db->from('dusun');
      return $this->db->get();
   }
}
