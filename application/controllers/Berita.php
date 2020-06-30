<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Berita_model');
   }

   public function index()
   {
      $konten = $this->load->view('berita/list_berita', null, true);
      $data_json = array(
         'konten' => $konten,
         'title' => 'Berita Terkini'
      );
      echo json_encode($data_json);
   }

   public function getberita()
   {
      $konten = $this->load->view('penduduk/data', null, true);
      $data_json = array(
         'konten' => $konten,
         'title' => 'Berita Terkini'
      );
      echo json_encode($data_json);
   }

   function list_berita()
   {
      $data = $this->Berita_model->get_berita();

      $konten = '';

      foreach ($data->result() as $key => $value) {
         $konten .= '
            <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="x_panel">
                  <div>
                     <h2 class="beritaJudul">'.$value->judul.' </h2>
                     <div class="x_title">
                        <small>'.$value->tanggal. '</small>
                        <div class="nav navbar-right">
                           <a href="#'.$value->id.'" class="linkEdit" data-toggle="tooltip" data-placement="top" title="Edit">
                           <span aria-hidden="true">Edit</span></a>
                           <a href="#'.$value->id.'" class="linkHapus data-toggle="tooltip" data-placement="top" title="Delete">
                           <span aria-hidden="true">Hapus</span></a>
                        </div>
                     <div class="clearfix"></div>
                     </div>
                     <div id="image-berita" class="d-flex ">
                        <img src="'.base_url("assets/img/").$value->file.'" alt="" class="img-thumbnail justify-center text-center" style="max-height: 200px;">
                     </div>
                  </div>
                  <div class="x_content">

                     <p class="isi-berita">'.$value->isi_berita.'</p>
                  </div>
               </div>
            </div>';

      }

      $data_json = array(
         'konten' => $konten,
      );
      echo json_encode($data_json);
   }

   public function form_create()
   {
      //$id_admin = $this->Berita_model->get_idadmin();
      $id_admin =  $this->session->userdata('id_admin'); //ini bebas mau ambil ap aj dri session login uknow lah
      $data_view = array(
         'title' => 'Form Tambah Berita',
         'id_admin'=> $id_admin
      );
      $konten = $this->load->view('berita/form_berita', $data_view, true);
      $data_json = array(
         'konten' => $konten,
         'title' => 'Form Tambah Berita',
      );
      echo json_encode($data_json);
   }

   public function create_action()
   {
      $this->db->trans_start();

      $arr_input = array(
         'id_admin'=>$this->input->post('id_admin'),
         'judul' => $this->input->post('judul'),
         'isi_berita' => $this->input->post('isi_berita'),
         // 'gambar'=> $this->input->post('gambar'),
         'tanggal' => date("Y-m-d H:i:s"),
      );
      $this->Berita_model->insert_data($arr_input);

      // $id = $this->db->insert_id();

      // if ($_FILES != null) {
      //    $this->do_upload($id, $_FILES);
      // }

      if ($this->db->trans_status() === FALSE) {
         $this->db->trans_rollback();
         $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal input data!');
      } else {
         $this->db->trans_commit();
         $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil input data!');
      }
      echo json_encode($data_output);
   }

   public function do_upload($id, $files)
   {
      $gallerPath = realpath(APPPATH . '../assets/img');
      $path = $gallerPath . '/' . $id;

      if (!is_dir($path)) {
         mkdir($path, 0777, TRUE);
      }
      $konfigurasi = array(
         'allowed_types' => 'jpg|jpeg|png',
         'upload_path' => $path,
         'overwrite' => TRUE
      );

      $this->load->library('upload', $konfigurasi);

      $_FILES['file']['name'] = $files['file']['name'];
      $_FILES['file']['type'] = $files['file']['type'];
      $_FILES['file']['tmp_name'] = $files['file']['tmp_name'];
      $_FILES['file']['error'] = $files['file']['error'];
      $_FILES['file']['size'] = $files['file']['size'];


      if ($this->upload->do_upload('file')) {
         $data = array('file' => $this->upload->data('file_name'));

         $this->Berita_model->update_data($id, $data);
         return 'Success Upload';
      } else {
         return 'Error Upload';
      }
   }

   public function update_action()
   {
      $this->db->trans_start();

      $id = $this->input->post('id');
      $arr_input = array(
         // 'id_admin'=>$this->input->post('id_admin'),
         'judul' => $this->input->post('judul'),
         'isi_berita' => $this->input->post('isi_berita'),
         // 'gambar'=> $this->input->post('gambar'),
         'tanggal' => date("Y-m-d H:i:s"),
      );

      $this->Berita_model->update_data($id, $arr_input);

      if ($this->db->trans_status() === FALSE) {
         $this->db->trans_rollback();
         $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal edit data!');
      } else {
         $this->db->trans_commit();
         $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil edit data!');
      }
      echo json_encode($data_output);
   }
}
