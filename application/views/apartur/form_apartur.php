            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                     <div class="x_title">
                     </div>
                     <div class="x_content">
                        <br />
                        <form id="form-apartur" data-parsley-validate class="form-horizontal form-label-left">
                           <input type="hidden" id="id_apartur">
                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Lengkap<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" id="nama" name="nama" required="required" class="form-input form-control col-md-7 col-xs-12">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jabatan <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" id="jabatan" name="jabatan" required="required" class="form-input form-control col-md-7 col-xs-12">
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div id="jkel" class="form-input btn-group">
                                    <label class="form-input">
                                       <input type="radio" name="jkel" id="laki" value="Laki-laki"> Laki-laki
                                    </label>
                                    <br>
                                    <label class="form-input">
                                       <input type="radio" name="jkel" id="perempuan" value="Perempuan"> Perempuan
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="ln_solid"></div>
                           <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                 <button class="btn btn-primary" id="btn-batal" type="button">Batal</button>
                                 <button type="submit" class="btn btn-success">Simpan</button>
                              </div>
                           </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>

            <script type="text/javascript">
               $('#form-apartur').on('submit', function(e) {
                  e.preventDefault();
                  sendDataPost();

               });

               $('#btn-batal').on('click', function(e) {
                  loadMenu('<?= base_url('apartur') ?>');
               });

               function sendDataPost() {
                  <?php
                  if ($title == 'Form Edit Aparatur Desa') {
                     echo 'var link = "'.base_url().'apartur/update_action/";';
                  } else {
                     echo 'var link = "'.base_url().'apartur/create_action/";';
                  }?>
                  var dataForm = {
                     nama: $('#nama').val(),
                     jabatan: $('#jabatan').val(),
                     jkel: $('input[name=jkel]:radio:checked').val(),
                     id_apartur: $('#id_apartur').val(),
                     
                  }
                  $.ajax(link, {
                     type: 'POST',
                     data: dataForm,
                     success: function(data, status, xhr) {
                        var data_str = JSON.parse(data);
                        alert(data_str['msg']);
                        loadMenu('<?= base_url('apartur') ?>');
                     },
                     error: function(jqXHR, textStatus, errorMsg) {
                        alert('Error : ' + errorMsg);
                     }
                  });
               }

               function getDetail(id_apartur) {
                  var link = '<?=base_url()?>apartur/detail?id_apartur=' + id_apartur;

                  $.ajax(link, {
                     type: 'GET',
                     success: function(data, status, xhr) {
                        var data_obj = JSON.parse(data);

                        if (data_obj['sukses'] == 'ya') {
                           var detail = data_obj['detail'];
                           $('#id_apartur').val(detail['id_apartur']);
                           $('#nama').val(detail['nama']);
                           $('#jabatan').val(detail['jabatan']);
                           if (detail['jkel'] == 'Laki-laki') {
                              $("#laki").prop('checked', true);
                           } else {
                              $("#perempuan").prop('checked', true);
                           }
                        } else {
                           alert('Data tidak ditemukan!');
                        }
                     },
                     error: function(jqXHR, textStatus, errorMsg) {
                        alert('Error : ' + errorMsg);
                     }
                  });
               }

               <?php
               if ($title == 'Form Edit Aparatur Desa') {
                  echo 'getDetail(' . $id_apartur . ');';
               }
               ?>
            </script>