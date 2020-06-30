<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepkel extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->model('Kepkel_model');
            $this->load->model('Dusun_model');
            $this->load->model('Datart_model');
      }

      public function index()
      {
            $konten = $this->load->view('kepkel/bulu_kk', null, true);
            $data_json = array(
                  'konten' => $konten,
                  'title' => 'Data Kepala Keluarga',
            );
            echo json_encode($data_json);
      }
      public function list($id)
      {
            $data['id'] = $id;
            $dusun = 'Data Kepala Keluarga Dusun ' . $this->Dusun_model->get_dusun($id)->nama_dsn;

            $konten = $this->load->view('kepkel/data', $data, true);
            $data_json = array(
                  'konten' => $konten,
                  'title' => $dusun,
            );
            echo json_encode($data_json);
      }

      public function tableKepkel($param)
      {
            $data_kk = $this->Kepkel_model->get_kk($param);
            $this->kk_list($data_kk);
      }

      public function kk_list($data_kk)
      {
            $konten = '
                  <thead>
                  <tr class="headings">
                  <th class="column-title">#</th>
                  <th class="column-title">No KK</th>
                  <th class="column-title">Nama</th>
                  <th class="column-title">Dusun</th>
                  <th class="column-title">RT</th>
                  </tr>
                  </thead>';

            $i = 1;
            foreach ($data_kk->result() as $key => $value) {
                  $konten .= '
                  <tbody>
                        <tr class="even pointer">
                        <td>' . $i++ . '</td>
                        <td>' . $value->no_kk . '</td>
                        <td>' . $value->nama_kk . '</td>
                        <td>' . $value->nama_dsn . '</td>
                        <td>' . $value->no_rt . '</td>
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
            $rt = $this->Datart_model->get_rt($id);
            $data_view = array(
                  'title' => 'Form Tambah Kepala Keluarga',
                  'id' => $id,
                  'rt' => $rt

            );
            $konten = $this->load->view('kepkel/form_kk', $data_view, true);
            $data_json = array(
                  'konten' => $konten,
                  'title' => 'Form Tambah Kepala Keluarga',
            );
            echo json_encode($data_json);
      }

      public function create_action()
      {
            $this->db->trans_start();

            $arr_input = array(
                  'id_dusun' => $this->input->post('id_dusun'),
                  'no_kk' => $this->input->post('no_kk'),
                  'id_rt' => $this->input->post('id_rt'),
                  'nama_kk' => $this->input->post('nama_kk'),
            );
            $this->Kepkel_model->insert_data($arr_input);

            if ($this->db->trans_status() === FALSE) {
                  $this->db->trans_rollback();
                  $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal input data!');
            } else {
                  $this->db->trans_commit();
                  $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil input data!');
            }
            echo json_encode($data_output);
      }

      public function cari_data()
      {
            $konten = '';
            $query_cari = '';

            if ($this->input->post('query')) {
                  $query_cari = $this->input->post('query');
            }
            $data = $this->Kepkel_model->cari_data($query_cari);

            $konten = '
                  <thead>
                  <tr class="headings">
                  <th class="column-title">No KK</th>
                  <th class="column-title">Nama</th>
                  <th class="column-title">Dusun</th>
                  <th class="column-title">RT</th>
                  </tr>
                  </thead>';

            if ($data->num_rows() > 0) {

                  foreach ($data->result() as $key => $value) {
                  $konten .= '<tr class="even pointer">
                  <td>' . $value->no_kk . '</td>
                  <td>' . $value->nama_kk . '</td>
                  <td>' . $value->nama_dsn . '</td>
                  <td>' . $value->no_rt . '</td>
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
}
