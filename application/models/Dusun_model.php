<?php 
class Dusun_model extends CI_Model{
	function get_listdusun(){
		$hasil = $this->db->query("select * from dusun");
		return $hasil -> result();
		
	}
}
