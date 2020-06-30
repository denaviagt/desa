<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepkel_model extends CI_Model {

     public function get_kk($id_dusun)
     {
          $query = "SELECT * FROM `kepala_keluarga` 
                    JOIN `data_rt` ON `data_rt`.`id_rt` = `kepala_keluarga`.`id_rt`
                    JOIN `dusun` ON `dusun`.`id_dusun` = `kepala_keluarga`.`id_dusun` 
                    WHERE `kepala_keluarga`.`id_dusun` = $id_dusun
                    ORDER BY `kepala_keluarga`.`id_rt`";
          return $this->db->query($query);
     }

     public function insert_data($data)
     {
          $this->db->insert('kepala_keluarga', $data);
     }

     public function cari_data($query_cari)
     {
          $query = "SELECT * FROM `kepala_keluarga` 
                    JOIN `data_rt` ON `data_rt`.`id_rt` = `kepala_keluarga`.`id_rt`
                    JOIN `dusun` ON `dusun`.`id_dusun` = `kepala_keluarga`.`id_dusun`";
          if ($query != '') {
                $query = "SELECT * FROM `kepala_keluarga` 
                    JOIN `data_rt` ON `data_rt`.`id_rt` = `kepala_keluarga`.`id_rt`
                    JOIN `dusun` ON `dusun`.`id_dusun` = `kepala_keluarga`.`id_dusun`
                    WHERE `no_kk` like '%".$query_cari."%' OR `nama_kk` like '%".$query_cari."%'
                    ORDER BY `nama_kk` ASC ";

          }

          return $this->db->query($query);
     }
}