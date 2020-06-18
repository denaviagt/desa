<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	function __construct(){
      parent::__construct();		
      $this->load->model('Penduduk_model');
      }

	public function Blambangan()
	{
      $konten = $this->load->view('penduduk/blambangan_list', null, true);
      $data_json = array(
         'konten' => $konten, 
         'title' => 'Data Penduduk Blambangan',
      );
      echo json_encode($data_json);
      }
      
   public function bulu()
	{
         $konten = $this->load->view('penduduk/bulu_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Bulu',
         );
         echo json_encode($data_json);
   }

   public function jlatren()
	{
         $konten = $this->load->view('penduduk/jlatren_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Jlatren',
         );
         echo json_encode($data_json);
   }

   public function jragung()
	{
         $konten = $this->load->view('penduduk/jragung_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Jragung',
         );
         echo json_encode($data_json);
   }

   
      public function karongan()
	{
         $konten = $this->load->view('penduduk/karongan_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Karongan',
         );
         echo json_encode($data_json);
   }

      public function kranggan1()
	{
         $konten = $this->load->view('penduduk/kranggan1_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Kranggan 1',
         );
         echo json_encode($data_json);
   }
   
      public function kranggan2()
	{
         $konten = $this->load->view('penduduk/kranggan2_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Kranggan 2',
         );
         echo json_encode($data_json);
   }
      public function krasaan()
	{
         $konten = $this->load->view('penduduk/krasaan_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Krasaan',
         );
         echo json_encode($data_json);
   }

      public function rejosari()
	{
         $konten = $this->load->view('penduduk/rejosari_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Rejosari',
         );
         echo json_encode($data_json);
   }

      public function morobangun()
	{
         $konten = $this->load->view('penduduk/morobangun_list', null, true);
         $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Penduduk Morobangun',
         );
         echo json_encode($data_json);
   }
   public function penduduk_list()
   {
         $data_penduduk = $this->Penduduk_model->get_penduduk();
         $this->table_list($data_penduduk);
   }

   public function blambangan_list()
   {
         $data_penduduk = $this->Penduduk_model->blambangan_list();
         $this->table_list($data_penduduk);
   }
   public function bulu_list()
   {
         $data_penduduk = $this->Penduduk_model->bulu_list();
         $this->table_list($data_penduduk);
   }
    public function jlatren_list()
   {
         $data_penduduk = $this->Penduduk_model->jlatren_list();
         $this->table_list($data_penduduk);
   }
    public function jragung_list()
   {
         $data_penduduk = $this->Penduduk_model->jragung_list();
         $this->table_list($data_penduduk);
   }
    public function karongan_list()
   {
         $data_penduduk = $this->Penduduk_model->karongan_list();
         $this->table_list($data_penduduk);
   }
    public function kranggan1_list()
   {
         $data_penduduk = $this->Penduduk_model->kranggan1_list();
         $this->table_list($data_penduduk);
   }
    public function kranggan2_list()
   {
         $data_penduduk = $this->Penduduk_model->kranggan2_list();
         $this->table_list($data_penduduk);
   }
   public function krasaan_list()
   {
         $data_penduduk = $this->Penduduk_model->krasaan_list();
         $this->table_list($data_penduduk);
   }
   public function rejosari_list()
   {
         $data_penduduk = $this->Penduduk_model->rejosari_list();
         $this->table_list($data_penduduk);
   }
    public function morobangun_list()
   {
         $data_penduduk = $this->Penduduk_model->morobangun_list();
         $this->table_list($data_penduduk);
   }


   public function table_list($data_penduduk)
	
   {
             
            $konten = '<tr class="headings">
                  <th class="column-title">No KK </th>
                  <th class="column-title">NIK </th>
                  <th class="column-title">Nama </th>
                  <th class="column-title">Tanggal Lahir </th>
                  <th class="column-title">Jenis Kelamin </th>
                  <th class="column-title">Pendidikan</th>
                  <th class="column-title">Agama</th>
                  <th class="column-title">Status</th>
                  <th class="column-title">Aksi </th>
                  </tr>';

         foreach ($data_penduduk -> result() as $key => $value) {
               $konten .= '<tr class="even pointer">
                  <td>'.$value->no_kk.'</td>
                  <td>'.$value->nik.'</td>
                  <td>'.$value->nama.'</td>
                  <td>'.$value->tgl_lahir.'</td>
                  <td>'.$value->jkel.'</td>
                  <td>'.$value->pendidikan.'</td>
                  <td>'.$value->agama.'</td>
                  <td>'.$value->status.'</td>
                  <td>
                     <a data-toggle="tooltip" data-placement="top" title="Edit">
                     <span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
                     <a data-toggle="tooltip" data-placement="top" title="Delete">
                     <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
               </tr>';
         }

         $data_json = array(
               'konten' => $konten,
         );
         echo json_encode($data_json);
	}

}