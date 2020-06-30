            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                  </div>
                  <div class="x_content">

                    <br />
                    <form id="form-penduduk" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kk">Np KK<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="no_kk" required="required">
                            <option readonly>Pilih No KK</option>
                            <?php foreach ($no_kk->result() as $key => $value) : ?>
                              <option value="<?= $value->no_kk ?>"><?= $value->no_kk ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nik" name="nik" required="required" class="form-input form-control col-md-7 col-xs-12" placeholder="Masukkan NIK">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Lengkap<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name="nama" required="required" class="form-input form-control col-md-7 col-xs-12" placeholder="Masukkan Nama Lengkap">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal lahir <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-input form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pendidikan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pendidikan" name="pendidikan" required="required" class="form-input form-control col-md-7 col-xs-12" placeholder="Masukkan Pendidikan Terakhir">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pekerjaan">Pekerjaan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pekerjaan" name="pekerjaan" required="required" class="form-input form-control col-md-7 col-xs-12" placeholder="Masukkan Pekerjaan">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="agama" required="required" placeholder="Masukkan Agama">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="status" class="form-input btn-group">
                            <label class="form-input">
                              <input type="radio" name="status" id="menikah" value="Menikah"> Menikah
                            </label>
                            <br>
                            <label class="form-input">
                              <input type="radio" name="status" id="blm_menikah" value="Belum Menikah"> Belum Menikah
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

              $('#form-penduduk').on('submit', function(e) {
                e.preventDefault();
                sendDataPost();

              });

              $('#btn-batal').on('click', function(e) {
                loadMenu('<?= base_url('penduduk/list/') . $id ?>');
              });

              function sendDataPost($id) {

                <?php
                if ($title == 'Form Edit Penduduk') {
                  echo 'var link = "' . base_url() . 'penduduk/update_action/";';
                } else {
                  echo 'var link = "' . base_url() . 'penduduk/create_action/";';
                } ?>
                var dataForm = {
                  id: $id,
                  no_kk: $('#no_kk').val(),
                  nik: $('#nik').val(),
                  nama: $('#nama').val(),
                  tgl_lahir: $('#tgl_lahir').val(),
                  jkel: $('input[name=jkel]:radio:checked').val(),
                  pendidikan: $('#pendidikan').val(),
                  pekerjaan: $('#pekerjaan').val(),
                  agama: $('#agama').val(),
                  status: $('input[name=status]:radio:checked').val(),
                }
                // console.log(dataForm);
                $.ajax(link, {
                  type: 'POST',
                  data: dataForm,
                  success: function(data, status, xhr) {
                    //  console.log(data);
                    var data_str = JSON.parse(data);
                    alert(data_str['msg']);
                    loadMenu('<?= base_url('penduduk/list/') . $id ?>');
                  },
                  error: function(jqXHR, textStatus, errorMsg) {
                    alert('Error : ' + errorMsg);
                  }
                });
              }

              function getDetail(nik, id) {
                var link = '<?=base_url()?>penduduk/detail?nik=' + nik;

                $.ajax(link, {
                  type: 'GET',
                  success: function(data, status, xhr) {
                    var data_obj = JSON.parse(data);

                    if (data_obj['sukses'] == 'ya') {
                      var detail = data_obj['detail'];
                      $('#no_kk').val(detail['no_kk']);
                      $('#nik').val(detail['nik']);
                      $('#nama').val(detail['nama']);
                      $('#tgl_lahir').val(detail['tgl_lahir']);
                      $('#pendidikan').val(detail['pendidikan']);
                      $('#pekerjaan').val(detail['pekerjaan']);
                      $('#agama').val(detail['agama']);
                      if (detail['jkel'] == 'Laki-laki') {
                        $("#laki").prop('checked', true);
                      } else {
                        $("#perempuan").prop('checked', true);
                      }
                      if (detail['status'] == 'Menikah') {
                        $("#menikah").prop('checked', true);
                      } else {
                        $("#blm_menikah").prop('checked', true);
                      }
                      // $('input[name=jkel]:radio:checked').val(detail['jkel']);
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
              if ($title == 'Form Edit Penduduk') {
                echo 'getDetail(' . $nik . ');';
              }
              ?>
            </script>