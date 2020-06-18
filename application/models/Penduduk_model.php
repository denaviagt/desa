<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk_model extends CI_Model {
     public function get_penduduk()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', $id_dusun);
          return $this->db->get();
     }

     public function blambangan_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 1);
          return $this->db->get();
     }

     public function bulu_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 2);
          return $this->db->get();
     }
     
     public function jlatren_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 3);
          return $this->db->get();
     }

      public function jragung_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 4);
          return $this->db->get();
     }

      public function karongan_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 5);
          return $this->db->get();
     }

      public function kranggan1_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 6);
          return $this->db->get();
     }
      public function kranggan2_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 7);
          return $this->db->get();
     }
     public function krasaan_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 8);
          return $this->db->get();
     }
      public function rejosari_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 9);
          return $this->db->get();
     }
      public function morobangun_list()
     {
          $this->db->select('penduduk.*');
          $this->db->from('penduduk');
          $this->db->join('kepala_keluarga', 'kepala_keluarga.no_kk = penduduk.no_kk');
          $this->db->join('dusun', 'dusun.id_dusun = kepala_keluarga.id_dusun');
          $this->db->where('dusun.id_dusun', 10);
          return $this->db->get();
     }
      
}
