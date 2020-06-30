<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Administratif extends CI_Controller
{
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
         'title' => 'Laporan Administratif',
      );
      echo json_encode($data_json);
   }
   public function administratif_list()
   {
      $data_administratif = $this->Administratif_model->get_administratif();

      $konten =  '
               <thead>
                  <tr class="headings">
                  <th class="column-title col-md-1">#</th>
                  <th class="column-title col-md-3">Dusun</th>
                  <th class="column-title col-md-3">Kepala Dukuh</th>
                  <th class="column-title col-md-2 text-center">Jumlah KK</th>
                  <th class="column-title col-md-3 text-center">Jumlah Penduduk</th>
                  </tr>
                  </thead>';
      $i = 1;
      foreach ($data_administratif->result() as $key => $value) {
         $konten .= '<tr class="even pointer">
                  <td>' . $i++ . '</td>
                  <td>' . $value->nama_dsn . '</td>
                  <td>' . $value->kepala_dkh . '</td>
                  <td class="text-center">' . $value->jumlah_kk . '</td>
                  <td class="text-center">' . $value->total_penduduk . '</td>
               </tr>';
      }
      $data_json = array(
         'konten' => $konten,
      );
      // var_dump($data_json); die;
      echo json_encode($data_json);
   }
}
