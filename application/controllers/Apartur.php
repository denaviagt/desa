<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apartur extends CI_Controller
{

     function __construct()
     {
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
          $konten = '
          <thead>
          <tr class="headings">
               <th class="column-title col-md-1 text-center">ID Aparatur </th>
               <th class="column-title col-md-4">Nama </th>
               <th class="column-title col-md-3">Jabatan </th>
               <th class="column-title col-md-3">Jenis Kelamin </th>
               <th class="column-title col-md-1">Aksi </th>
          </tr>
          </thead>';

          foreach ($data_apartur->result() as $key => $value) {
               $konten .= '<tr class="even pointer">
                    <td class="text-center ">' . $value->id_apartur . '</td>
                    <td>' . $value->nama . '</td>
                    <td class="col-3">' . $value->jabatan . '</td>
                    <td class="col-3">' . $value->jkel . '</td>
                    <td>
                    <a href="#' . $value->id_apartur . '" class="linkEdit" data-toggle="tooltip" data-placement="top" title="Edit">
                    <span class="glyphicon glyphicon-edit " aria-hidden="true"></span>
                    <a href="#' . $value->id_apartur . '" class="linkHapus data-toggle="tooltip" data-placement="top" title="Delete">
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

          $data_view = array(
               'title' => 'Form Tambah Aparatur Desa'
          );
          $konten = $this->load->view('apartur/form_apartur', $data_view, true);
          $data_json = array(
               'konten' => $konten,
               'title' => 'Form Tambah Aparatur Desa',
          );
          echo json_encode($data_json);
     }


     public function form_edit($id_apartur)
     {
          $data_view = array(
               'title' => 'Form Edit Aparatur Desa',
               'id_apartur' => $id_apartur,
          );
          $konten = $this->load->view('apartur/form_apartur', $data_view, true);
          $data_json = array(
               'konten' => $konten,
               'title' => 'Form Edit Aparatur Desa',
               'id_apartur' => $id_apartur
          );
          echo json_encode($data_json);
     }

     public function create_action()
     {
          $this->db->trans_start();

          $arr_input = array(
               'nama' => $this->input->post('nama'),
               'jabatan' => $this->input->post('jabatan'),
               'jkel' => $this->input->post('jkel'),
          );
          $this->Apartur_model->insert_data($arr_input);

          if ($this->db->trans_status() === FALSE) {
               $this->db->trans_rollback();
               $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal input data!');
          } else {
               $this->db->trans_commit();
               $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil input data!');
          }
          echo json_encode($data_output);
     }

     public function update_action()
     {
          $this->db->trans_start();

          $id_apartur = $this->input->post('id_apartur');
          $arr_input = array(
               'id_apartur' => $this->input->post('id_apartur'),
               'nama' => $this->input->post('nama'),
               'jabatan' => $this->input->post('jabatan'),
               'jkel' => $this->input->post('jkel'),
          );

          $this->Apartur_model->update_data($id_apartur, $arr_input);

          if ($this->db->trans_status() === FALSE) {
               $this->db->trans_rollback();
               $data_output = array('sukses' => 'tidak', 'msg' => 'Gagal edit data!');
          } else {
               $this->db->trans_commit();
               $data_output = array('sukses' => 'ya', 'msg' => 'Berhasil edit data!');
          }
          echo json_encode($data_output);
     }

     public function detail()
     {
          $id_apartur = $this->input->get('id_apartur');
          $data_detail = $this->Apartur_model->get_by_id($id_apartur);

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

          $id_apartur = $this->input->get('id_apartur');

          $this->Apartur_model->delete_data($id_apartur);

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
          $data = $this->Apartur_model->cari_data($query);

          $konten = '
          <thead>
          <tr class="headings">
               <th class="column-title">ID Aparatur </th>
               <th class="column-title">Nama </th>
               <th class="column-title">Jabatan </th>
               <th class="column-title">Jenis Kelamin </th>
               <th class="column-title">Aksi </th>
          </tr>
          </thead>';

          if ($data->num_rows() > 0) {

               foreach ($data->result() as $key => $value) {
                    $konten .= '<tr class="even pointer">
                         <td class="text-center">' . $value->id_apartur . '</td>
                         <td>' . $value->nama . '</td>
                         <td>' . $value->jabatan . '</td>
                         <td>' . $value->jkel . '</td>
                         <td>
                         <a href="#' . $value->id_apartur . '" class="linkEdit" data-toggle="tooltip" data-placement="top" title="Edit">
                         <span class="glyphicon glyphicon-edit " aria-hidden="true"></span>
                         <a href="#' . $value->id_apartur . '" class="linkHapus data-toggle="tooltip" data-placement="top" title="Delete">
                         <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
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

     public function pdf()
     {
          $this->load->library('dompdf_gen');

          $data['apartur'] = $this->Apartur_model->get_apartur();

          $this->load->view('apartur/laporan_pdf', $data);

          $paper_size = 'A4';
          $orientation = 'potrait';
          $html = $this->output->get_output();
          $this->dompdf->set_paper($paper_size, $orientation);

          $this->dompdf->load_html($html);
          $this->dompdf->render();
          $this->dompdf->stream('Daftar Aparatur.pdf', array('Attachment' => 0));
     }

     public function excell()
     {
          $data['apartur'] = $this->Apartur_model->get_apartur();
          //print_r($data['apartur']->result_array());exit();
          require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
          require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

          $object = new PHPExcel();

          $object->getProperties()->setCreator("Anggita Denavia");
          $object->getProperties()->setLastModifiedBy("Anggita Denavia");
          $object->getProperties()->setTitle("Daftar Aparatur");

          $object->setActiveSheetIndex(0);

          $object->getActiveSheet()->setCellValue('A1', 'No');
          $object->getActiveSheet()->setCellValue('B1', 'ID Aparatur');
          $object->getActiveSheet()->setCellValue('C1', 'Nama');
          $object->getActiveSheet()->setCellValue('D1', 'Jabatan');
          $object->getActiveSheet()->setCellValue('E1', 'Jenis Kelamin');

          $baris = 2;
          $no = 1;

          foreach ($data['apartur']->result() as $key) {
               $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
               $object->getActiveSheet()->setCellValue('B' . $baris, $key->id_apartur);
               $object->getActiveSheet()->setCellValue('C' . $baris, $key->nama);
               $object->getActiveSheet()->setCellValue('D' . $baris, $key->jabatan);
               $object->getActiveSheet()->setCellValue('E' . $baris, $key->jkel);
               $baris++;
          }

          //$filename = "Data Apartur-" . date('Y-m-d-H-i-s') . ".xlsx";
          // $filename='test.xls';
          //sett dsni nya kali blm klop sma excel e
          // hayoo loo, wkwkwk
          //itu kemarin tak rubah sih, bentar lupa
          $object->getActiveSheet()->setTitle('Data Apartur');
          // $writer = new PHPExcel($spreadsheet);
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment;filename="Latihan.xls"');
          header('Cache-Control: max-age=0');

          $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
          $writer->save('php://output');

          exit;
     }
}
