<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datart_model extends CI_Model{
   public function get_daftar_rt()
   {
      $this->db->select('data_rt.*, dusun.nama_dsn, count(kepala_keluarga.no_kk) as jumlah_kk, count(penduduk.nik) as jumlah_penduduk');
      $this->db->from('data_rt');
      $this->db->join('dusun', 'dusun.id_dusun = data_rt.id_dusun');
      $this->db->join('kepala_keluarga', 'kepala_keluarga.id_rt = data_rt.id_rt');
      $this->db->join('penduduk', 'penduduk.no_kk = kepala_keluarga.no_kk');
      $this->db->group_by('kepala_keluarga.id_rt', 'penduduk.no_kk');
      return $this->db->get();
   }
}