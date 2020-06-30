<?php

defined('BASEPATH') or exit('No direct script access allowed');

class All_model extends CI_Model
{

    public function count_penduduk()
    {
        return $this->db->count_all('penduduk');
    }

    public function count_kk()
    {
        return $this->db->count_all('kepala_keluarga');
    }

    public function count_dusun()
    {
        return $this->db->count_all('dusun');
    }


    public function count_aparatur()
    {
        return $this->db->count_all('apartur_desa');
    }

    public function get_jekel()
    {
        $query = ("SELECT jkel, COUNT(*) AS jum_pend FROM `penduduk` GROUP BY jkel");

        return $this->db->query($query)->result();
    }

    public function get_pend_dusun()
    {
        $query = ("SELECT SUM(jumlah_penduduk) AS jumlah, nama_dsn FROM `jumlah_penduduk` GROUP BY id_dusun");
        return $this->db->query($query)->result();
    }

    public function getAll()
    {
        $query = ("SELECT jp.nama_dsn, nkh.menikah, blm.belum_menikah, per.jum_perempuan, laki.jum_laki, SUM(jp.jumlah_penduduk) AS total 
        FROM jumlah_penduduk AS jp
        JOIN dusun_menikah AS nkh ON nkh.id_dusun = jp.id_dusun 
        JOIN dusun_blmnikah AS blm ON blm.id_dusun = jp.id_dusun 
        JOIN jumlah_perempuan AS per ON per.id_dusun = jp.id_dusun
        JOIN jumlah_laki AS laki ON laki.id_dusun = jp.id_dusun
        GROUP BY jp.id_dusun");
        return $this->db->query($query)->result();
    }

    public function jkel_dusun()
    {
        $query = ("SELECT nama_dsn, jum_perempuan, jum_laki FROM `dusun` JOIN jumlah_perempuan ON jumlah_perempuan.id_dusun = dusun.id_dusun JOIN jumlah_laki ON jumlah_laki.id_dusun = dusun.id_dusun GROUP BY dusun.id_dusun");
        return $this->db->query($query)->result();
    }

    public function get_umur()
    {
        $query = ("SELECT (YEAR(CURDATE())-YEAR(tgl_lahir)) AS Umur, COUNT(*) AS jumlah FROM `penduduk` GROUP BY Umur");

        return $this->db->query($query)->result();
    }

    public function get_agama()
    {
        $query = ("SELECT agama, COUNT(*) AS jum_pend FROM `penduduk` GROUP BY agama");
        return $this->db->query($query)->result();
    }

    public function get_pendidikan()
    {
        $query = ("SELECT pendidikan, COUNT(*) as jumlah FROM `penduduk` GROUP BY pendidikan");

        return $this->db->query($query)->result();
    }
}
