<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
      parent::__construct();		
      $this->load->model('Admin_model');
      
      }

   public function index()
	{
      $this->load->library('session');

      if ($this->session->userdata('id_admin') != null && $this->session->userdata('id_admin') != "") {
         redirect('home');
      } else {
      
         $this->load->view('head');
         $this->load->view('login');
      }
      
	}

   public function checkLogin()
   {
      $username = $this->input->post('username');
      $passowrd = $this->input->post('password');

      $cek = $this->Admin_model->checkAdmin($username, sha1($passowrd));

      if ($cek->num_rows()>0) {
         $data_json = array('sukses'=> 'Ya', 'admin'=>$cek->row_array());
      } else {
         $data_json = array('sukses'=> 'Tidak', 'msg'=> "Username dan Password tidak terdaftar!!");
      }
      echo json_encode($data_json);
   }
   
   public function setSession()
   {
      $this->load->library('session');

      $id_admin = $this->input->post('id_admin');
      $username = $this->input->post('username');
      $nama_admin = $this->input->post('nama_admin');
      $telp = $this->input->post('telp');
      $admin_profil = $this->input->post('admin_profil');

      $this->session->set_userdata('id_admin', $id_admin);
      $this->session->set_userdata('username', $username);
      $this->session->set_userdata('nama_admin', $nama_admin);
      $this->session->set_userdata('telp', $telp);
      $this->session->set_userdata('admin_profil', $admin_profil);
   }

   public function logout()
   {
      $this->load->library('session');

      $this->session->sess_destroy();
      redirect('login');
   }

}