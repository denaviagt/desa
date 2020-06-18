<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Dusun_model');
	}
     // panggil template
	public function index()
	{
          $data_dusun['dusuns']= $this->Dusun_model->get_listdusun();
          $this->load->view('home', $data_dusun);
          // $konten = $this->load->view('home', null, true);
          // $data_json = array(
          //      'konten' => $konten,
          // );

          // $this->jquery->click('#', code_to_run());
	}

	// public function dropdown_list()
	// {
     //      $konten='';

     //      foreach ($data_dusun->result() as $key => $value) {
     //           $konten .=' <li><a href="#" class="dropdownlink" id="'.$value->nama_dsn.'">'.$value->nama_dsn.'</a></li>';
     //      }
         
     //      $data_json = array(
     //           'konten' => $konten,
     //      );
     //      echo json_encode($data_json);
     // }

}
