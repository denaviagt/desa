<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('All_model');
    }

    //Jenis Kelamin
    public function Jeniskelamin()
    {
        $konten = $this->load->view('statistik/jenis_kelamin', null, true);
        $data_json = array(
            'konten' => $konten,
            'title' => 'Statistik Jenis Kelamin',
        );
        echo json_encode($data_json);
    }

    public function jkelData()
	{
		$data = $this->All_model->get_jekel();
		echo json_encode($data);
    }
    
    public function jkelDusun()
	{
		$data = $this->All_model->jkel_dusun();
		echo json_encode($data);
    }

    //Usia
    public function Usia()
    {
        $konten = $this->load->view('statistik/usia', null, true);
        $data_json = array(
            'konten' => $konten,
            'title' => 'Statistik Usia Penduduk',
        );
        echo json_encode($data_json);
    }

    public function getUsia()
    {
        $data = $this->All_model->get_umur();
        echo json_encode($data);
    }

    //Agama
    public function Agama()
    {
        $konten = $this->load->view('statistik/agama', null, true);
        $data_json = array(
            'konten' => $konten,
            'title' => 'Statistik Agama Penduduk',
        );
        echo json_encode($data_json);
    }

    public function getAgama()
    {
        $data = $this->All_model->get_agama();
        echo json_encode($data);
    }

    //Pendidikan
    public function Pendidikan()
    {
        $konten = $this->load->view('statistik/pendidikan', null, true);
        $data_json = array(
            'konten' => $konten,
            'title' => 'Statistik Pendidikan Penduduk',
        );
        echo json_encode($data_json);
    }

    public function get_pendidikan()
    {
        $data = $this->All_model->get_pendidikan();
        echo json_encode($data);
    }

}
