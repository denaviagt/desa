<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rt extends CI_Controller {

	function __construct(){
      parent::__construct();		
      $this->load->model('Datart_model');
      }

	public function index()
   {
      $konten = $this->load->view('rumah_tangga/rt_list', null, true);
      $data_json = array(
         'konten' => $konten,
         'title' => 'Daftar RT',
      );
      echo json_encode($data_json);
   }

   public function rt_list()
   {
      $daftar_rt = $this->Datart_model->get_daftar_rt();

      $konten = '
               <thead>
                  <tr class="headings">
                  <th class="column-title col-md-1">#</th>
                  <th class="column-title col-md-3">Dusun</th>
                  <th class="column-title col-md-2">RT</th>
                  <th class="column-title col-md-3 text-center">Jumlah KK</th>
                  <th class="column-title col-md-3 text-center">Jumlah Penduduk</th>
                  </tr>
                  </thead>';
      $i = 1;
      foreach ($daftar_rt->result() as $key => $value) {
         $konten .= '<tr class="even pointer">
                  <td>'.$i++.'</td>
                  <td>'.$value->nama_dsn.'</td>
                  <td>'.$value->no_rt.'</td>
                  <td class="text-center">'.$value->jumlah_kk.'</td>
                  <td class="text-center">'.$value->total_penduduk.'</td>
               </tr>';
      }
      $data_json = array(
         'konten' => $konten,
      );
      // var_dump($data_json);die;
      echo json_encode($data_json);
   }


}