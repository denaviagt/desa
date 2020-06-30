<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Penduduk_model');
    }

	function index()
	{
	  $data['hasil']=$this->Penduduk_model->get_jekel();
	  $this->load->view('bulu_kk',$data);
	}
}
