<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{
     public function get_penduduk($id_dusun)
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', $id_dusun);
          // $this->db->limit($limit, $start);
          return $this->db->get();
     }

     public function get_penduduk_new($id_dusun, $limit, $start)
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', $id_dusun);
          $this->db->limit($limit, $start);
          return $this->db->get();
     }

     public function count_penduduk()
     {

          $this->db->get('penduduk')->num_rows();
     }

     public function insert_data($data)
     {
          $this->db->insert('penduduk', $data);
     }

     public function get_by_id($nik)
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('nik', $nik);
          return $this->db->get();
     }

     public function update_data($nik, $data)
     {
          $this->db->where('nik', $nik);
          $this->db->update('penduduk', $data);
     }

     public function delete_data($nik)
     {
          $this->db->where('nik', $nik);
          $this->db->delete('penduduk');
     }

     public function cari_data($query)
     {
          $this->db->select('*');
          $this->db->from('penduduk');

          if ($query != '') {
               $this->db->like('nik', $query);
               $this->db->or_like('no_kk', $query);
               $this->db->or_like('nama', $query);
          }
          $this->db->order_by('nama', 'ASC');
          return $this->db->get();
     }

     public function get_jekel()
     {
          $query = ("SELECT jkel, COUNT(*) AS jum_pend FROM `penduduk` GROUP BY jkel");

          return $this->db->query($query)->result();
     }

     public function get_umur()
     {
          $query = ("SELECT (YEAR(CURDATE())-YEAR(tgl_lahir)) AS Umur, COUNT(*) AS jumlah FROM `penduduk` GROUP BY Umur");

          return $this->db->query($query)->result();
     }

     public function get_nokk($id_dusun)
     {
          $query = "SELECT DISTINCT * FROM `kepala_keluarga`
          JOIN `dusun` ON `dusun`.`id_dusun` = `kepala_keluarga`.`id_dusun` 
          WHERE `kepala_keluarga`.`id_dusun` = $id_dusun
          ORDER BY `kepala_keluarga`.`no_kk` ASC";
          return $this->db->query($query);
          // $query = ("SELECT no_kk FROM penduduk WHERE no_kk LIKE '%.$no_kk.%' ORDER BY no_kk ASC");
          // return $this->db->query($query)->result();
          // $this->db->like('no_kk', $no_kk, 'both');;
          // $this->db->order_by('no_kk', 'ASC');
          // $this->db->limit(10);
          // return $this->db->get('penduduk')->result();
     }
}
