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

      $konten = '<tr class="headings">
                  <th class="column-title">Dusun</th>
                  <th class="column-title">RT</th>
                  <th class="column-title">Jumlah KK</th>
                  <th class="column-title">Jumlah Penduduk</th>
                  <th class="column-title">Aksi </th>
                  </tr>';

      foreach ($daftar_rt->result() as $key => $value) {
         $konten .= '<tr class="even pointer">
                  <td>'.$value->nama_dsn.'</td>
                  <td>'.$value->no_rt.'</td>
                  <td>'.$value->jumlah_kk.'</td>
                  <td>'.$value->jumlah_penduduk.'</td>
                  <td>
                     <a data-toggle= "tooltip" data-placement="top" title="Edit">
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