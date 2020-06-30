<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Administratif_model extends CI_Model
{
   public function get_administratif()
   {
      $this->db->select('*');
      $this->db->from('administratif_view');
      return $this->db->get();
   }
}
