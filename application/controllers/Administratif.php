<?php
defined('BASEPATH') OR exit('No direct script access allowes');

class Administratif extends CI_Controller{
   function __construct()
   {
      parent::__construct();
      $this->load->model('Administratif_model');
   }

   public function index()
   {
      $konten = $this->load->view('administratif/administratif_list', null, true);
      $data_json = array(
         'konten' => $konten,
         'title' =>'Laporan Administratif',
      );
      echo json_encode($data_json);
   }
   public function administratif_list()
   {
      $data_administratif = $this->Administratif_model->get_administratif();

      $konten =  '<tr class="headings">
                  <th class="column-title"Dusun</th>
                  <th class="column-title">Nama Dukuh</th>
                  <th class="column-title">Aksi </th>
                  </tr>';
      foreach ($data_administratif -> result() as $key => $value) {
         $konten .= '<tr class="even pointer">
                  <td>'.$value->nama_dsn.'</td>
                  <td>'.$value->kepala_dkh.'</td>
                  <td>
                     <a data-toggle="tooltip" data-placement="top" title="Edit">
                     <span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
                     <a data-toggle="tooltip" data-placement="top" title="Delete">
                     <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
               </tr>';
      }
      $data_json = array(
         'konten'=> $konten,
      );
      echo json_encode($data_json);
   }
}