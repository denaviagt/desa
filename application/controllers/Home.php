<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Dusun_model');
	}
     // panggil template
	public function index()
	{
		 $data_dusun['dusuns']= $this->Dusun_model->get_listdusun();
		$this->load->view('head');
		$this->load->view('home', $data_dusun);
		$this->load->view('footer');

	}

}
