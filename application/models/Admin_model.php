<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin_model extends CI_Model{
   public function checkAdmin($username, $password)
   {
      $this->db->select('*');
      $this->db->from('admin');
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      return $this->db->get();
   }
}