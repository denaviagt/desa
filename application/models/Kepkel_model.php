<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepkel_model extends CI_Model {
     // ini function ny hrsny ngrim paramter $id_dusun
     public function get_kk()
     {
          $query = "SELECT * FROM `kepala_keluarga` JOIN `dusun` ON `dusun`.`id_dusun` = `kepala_keluarga`.`id_dusun`";
          return $this->db->query($query);
     }
}