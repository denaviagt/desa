<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartur extends CI_Controller {

	function __construct(){
      parent::__construct();		
      $this->load->model('Apartur_model');
     }
     
	public function index()
	{
          
          $konten = $this->load->view('apartur/list_apartur', null, true);
          $data_json = array(
               'konten' => $konten, 
               'title' => 'Data Apartur',
          );
          echo json_encode($data_json);
	}
	public function apartur_list()
	{
          $data_apartur = $this->Apartur_model->get_apartur();
          

          $konten = '<tr class="headings">
               <th class="column-title">ID </th>
               <th class="column-title">Nama </th>
               <th class="column-title">Jabatan </th>
               <th class="column-title">Jenis Kelamin </th>
               <th class="column-title">Aksi </th>
          </tr>';

          foreach ($data_apartur -> result() as $key => $value) {
               $konten .= '<tr class="even pointer">
                    <td>'.$value->id_aparatur.'</td>
                    <td>'.$value->nama.'</td>
                    <td>'.$value->jabatan.'</td>
                    <td>'.$value->jkel.'</td>
                    <td>
                    <a data-toggle="tooltip" data-placement="top" title="Edit">
                    <span class="glyphicon glyphicon-edit " aria-hidden="true"></span>
                    <a data-toggle="tooltip" data-placement="top" title="Delete">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </a>
                    </td>
               </tr>';
          }

          $data_json = array(
               'konten' => $konten,
          );
          echo json_encode($data_json);
	}

     public function form_create()
     {
          $data_view = array('title' => 'Form Tambah Aparatur Desa');
          $konten = $this->load->view('apartur/form_apartur', $data_view, true);
          $data_json = array(
               'konten' => $konten,
               'title' => 'Form Tambah Aparatur Desa',
           );
           echo json_encode($data_json);
     }

}
