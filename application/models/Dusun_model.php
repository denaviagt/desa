<?php 
class Dusun_model extends CI_Model{
	function get_listdusun(){
		$hasil = $this->db->query("select * from dusun");
		return $hasil -> result();
		
	}

     public function get_dusun($id_dusun)
     {
          $this->db->select('nama_dsn');
          $this->db->from('dusun');
          $this->db->where('dusun.id_dusun', $id_dusun);
          return $this->db->get()->row();
     }
}
