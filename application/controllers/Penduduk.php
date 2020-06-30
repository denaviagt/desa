<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{

     function __construct()
     {
          parent::__construct();
          $this->load->model('Penduduk_model');
          $this->load->model('Dusun_model');
          $this->load->library('pagination');
     }

     public function list($id)
     {
          
          $data['id'] = $id;
          $data = array(
               'id' => $id,
          );
          $dusun = 'Data Penduduk ' . $this->Dusun_model->get_dusun($id)->nama_dsn;
          $konten = $this->load->view('penduduk/data', $data, true);
          $data_json = array(
               'konten' => $konten,
               'title' => $dusun,
          );
          echo json_encode($data_json);
     }

     public function tablePenduduk($param)
     {
          $data_penduduk = $this->Penduduk_model->get_penduduk($param);
          $this->table_list($data_penduduk);
     }



     public function table_list($data_penduduk)
     {
          $konten = '
               <thead>
               <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">No KK </th>
                    <th class="column-title">NIK </th>
                    <th class="column-title">Nama </th>
                    <th class="column-title text-wrap">Tanggal Lahir </th>
                    <th class="column-title">Jenis Kelamin </th>
                    <th class="column-title">Pendidikan</th>
                    <th class="column-title">Agama</th>
                    <th class="column-title">Pekerjaan</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Aksi </th>
               </tr>
               </thead>';
          $i = 1;
          foreach ($data_penduduk->result() as $key => $value) {
               $konten .= '
               <tbody>
                    <tr class="even pointer">
                    <td>' . $i++ . '</td>
                    <td>' . $value->no_kk . '</td>
                    <td>' . $value->nik . '</td>
                    <td>' . $value->nama . '</td>
                    <td>' . $value->tgl_lahir . '</td>
                    <td>' . $value->jkel . '</td>
                    <td>' . $value->pendidikan . '</td>
                    <td>' . $value->agama . '</td>
                    <td>' . $value->pekerjaan . '</td>
                    <td>' . $value->status . '</td>
                    <td>
                         <a href="#' . $value->nik . '" class="linkEdit" data-toggle="tooltip" data-placement="top" title="Edit">
                         <span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
                         <a href="#' . $value->nik . '" class="linkHapus data-toggle="tooltip" data-placement="top" title="Delete">
                         <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                    </tr>
               </tbody>';
          }

          $data_json = array(
               'konten' => $konten,
          );
          echo json_encode($data_json);
     }

     public function form_create($id)
     {
          $no_kk = $this->Penduduk_model->get_nokk($id);
          $data_view = array(
               'title' => 'Form Tambah Penduduk',
               'id' => $id,
               'no_kk' => $no_kk
          );
          // print_r($data_view);exit();
          $konten = $this->load->view('penduduk/form_penduduk', $data_view, true);
          $data_json = array(
               'konten' => $konten,
               'title' => 'Form Tambah Penduduk',
          );
          echo json_encode($data_json);
     }

     public function create_action()
     {
          $this->db->trans_start();

          $arr_input = array(
               'no_kk' => $this->input->post('no_kk'),
               'nik' => $this->input->post('nik'),
               'nama' => $this->input->post('nama'),
               'tgl_lahir' => $this->input->post('tgl_lahir'),
               'jkel' => $this->input->post('jkel'),
               'pendidikan' => $this->input->post('pendidikan'),
               'pekerjaan' => $this->input->post('pekerjaan'),
               'agama' => $this->input->post('agama'),
               'status' => $this->input->post('status'),
          );
          $this->Penduduk_model->insert_data($arr_input);

          if ($this->db->trans_status() === FALSE) {
               $this->db->trans_rollback();
               $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal input data!');
          } else {
               $this->db->trans_commit();
               $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil input data!');
          }
          echo json_encode($data_output);
     }

     public function form_edit($obj)
     {
          $asd = explode("-", $obj);
          $nik = isset($asd[0])?$asd[0]:0;
          $id = isset($asd[1])?$asd[1]:0;
          //echo $nik;exit();
          $no_kk = $this->Penduduk_model->get_nokk($id);
          $data_view = array(
               'title' => 'Form Edit Penduduk',
               'nik' => $nik,
               'id' => $id,
               'no_kk'=> $no_kk
          );
          // print_r($data_view); exit();
          $konten = $this->load->view('penduduk/form_penduduk', $data_view, true);
          $data_json = array(
               'konten' => $konten,
               'title' => 'Form Edit Penduduk',
               'nik' => $nik,
          );
          echo json_encode($data_json);
     }

     public function update_action()
     {
          $this->db->trans_start();

          $nik = $this->input->post('nik');
          $arr_input = array(
               'no_kk' => $this->input->post('no_kk'),
               'nik' => $this->input->post('nik'),
               'nama' => $this->input->post('nama'),
               'tgl_lahir' => $this->input->post('tgl_lahir'),
               'jkel' => $this->input->post('jkel'),
               'pendidikan' => $this->input->post('pendidikan'),
               'pekerjaan' => $this->input->post('pekerjaan'),
               'agama' => $this->input->post('agama'),
               'status' => $this->input->post('status'),
          );
          $this->Penduduk_model->update_data($nik, $arr_input);

          if ($this->db->trans_status() === FALSE) {
               $this->db->trans_rollback();
               $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal Edit data!');
          } else {
               $this->db->trans_commit();
               $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil Edit data!');
          }
          echo json_encode($data_output);
     }

     public function detail()
     {
          $nik = $this->input->get('nik');
          $data_detail = $this->Penduduk_model->get_by_id($nik);

          if ($data_detail->num_rows() > 0) {
               $data_output = array('sukses' => 'ya', 'detail' => $data_detail->row_array());
          } else {
               $data_output = array('sukses' => 'tidak');
          }
          echo json_encode($data_output);
     }

     public function delete_data()
     {
          $this->db->trans_start();

          $nik = $this->input->get('nik');
          $this->Penduduk_model->delete_data($nik);

          if ($this->db->trans_status() === FALSE) {
               $this->db->trans_rollback();
               $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal hapus data!');
          } else {
               $this->db->trans_commit();
               $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil hapus data!');
          }
          echo json_encode($data_output);
     }

     public function cari_data()
     {
          $konten = '';
          $query = '';

          if ($this->input->post('query')) {
               $query = $this->input->post('query');
          }
          $data = $this->Penduduk_model->cari_data($query);

          $konten = '
               <thead>
                    <tr class="headings">
                    <th class="column-title">No KK </th>
                    <th class="column-title">NIK </th>
                    <th class="column-title">Nama </th>
                    <th class="column-title">Tanggal Lahir </th>
                    <th class="column-title">Jenis Kelamin </th>
                    <th class="column-title">Pendidikan</th>
                    <th class="column-title">Agama</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Aksi </th>        
                    </tr>
               </thead>';

          if ($data->num_rows() > 0) {

               foreach ($data->result() as $key => $value) {
                    $konten .= '<tr class="even pointer">
                    <td>' . $value->no_kk . '</td>
                    <td>' . $value->nik . '</td>
                    <td>' . $value->nama . '</td>
                    <td>' . $value->tgl_lahir . '</td>
                    <td>' . $value->jkel . '</td>
                    <td>' . $value->pendidikan . '</td>
                    <td>' . $value->agama . '</td>
                    <td>' . $value->status . '</td>
                    <td>
                         <a href="#' . $value->nik . '" class="linkEdit" data-toggle="tooltip" data-placement="top" title="Edit">
                         <span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
                         <a href="#' . $value->nik . '" class="linkHapus data-toggle="tooltip" data-placement="top" title="Delete">
                         <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                    </tr>';
               }
          } else {
               $konten = '<tr>
                         <td colspan="5">Data Not Found</td>
                         </tr>';
          }

          $data_json = array(
               'konten' => $konten,
          );
          echo json_encode($data_json);
     }

     public function get_autocomplate()
     {
          $term = $this->input->get('term');
          $this->db->like('no_kk', $term);
          $data = $this->db->get('penduduk')->result();
          echo json_encode($data);
     }
}
