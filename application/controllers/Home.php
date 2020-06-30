<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dusun_model');
		$this->load->model('All_model');
		$this->load->model('Penduduk_model');
		$this->load->model('Berita_model');
	}
	// panggil template
	public function index()
	{
		$this->load->library('session');
		$data = array(
			'penduduk' => $this->All_model->count_penduduk(),
			'kk' => $this->All_model->count_kk(),
			'dusun' => $this->All_model->count_dusun(),
			'aparatur' => $this->All_model->count_aparatur(),
			'berita'=>$this->Berita_model->get_berita_home()
		);
		//ambil USER WHERE sedang berada di session, ckup 1 baris ini ambil sesion data bersamaan dgn tbl
		// Tambah 
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		if ($this->session->userdata('id_admin') != null && $this->session->userdata('id_admin') != "") {
			$this->load->view('head');
			$this->load->view('home', $data);
			$this->load->view('footer');
		} else {
			redirect('login');
		}
	}
	public function jkelData()
	{
		$data = $this->Penduduk_model->get_jekel();
		echo json_encode($data);
	}

	public function umurData()
	{
		$data = $this->Penduduk_model->get_umur();
		print_r(json_encode($data)); exit();
	}

	public function pendDusun()
	{
		$data = $this->All_model->get_pend_dusun();
		echo json_encode($data);
	}

	public function getAllDusun()
	{
		$data = $this->All_model->getAll();
		echo json_encode($data);
	}
}
