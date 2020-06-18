<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepkel extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->model('Kepkel_model');
      }

      public function index()
      {
            $konten = $this->load->view('kepkel/bulu_kk', null, true);
            $data_json = array(
                  'konten'=>$konten,
                  'title'=> 'Data Kepala Keluarga',
            );
            echo json_encode($data_json);
      }

      public function kk_list()
      {
            $data_kk = $this->Kepkel_model->get_kk();
            // var_dump($data_kk); die;
            $konten='<tr class="headings">
                  <th class="column-title">No KK</th>
                  <th class="column-title">Nama</th>
                  <th class="column-title">Dusun</th>
                  <th class="column-title">Aksi </th>
                  </tr>';
                  // ini hrs manggil array, hihi
                  foreach ($data_kk->result() as $key => $value) {
                  $konten .= '<tr class="even pointer">
                  <td>'.$value->no_kk.'</td>
                  <td>'.$value->nama_kk.'</td>
                  <td>'.$value->nama_dsn.'</td>
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
            // var_dump($data_json);die;
            echo json_encode($data_json);
      }
}
