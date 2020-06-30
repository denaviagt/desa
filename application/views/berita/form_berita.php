            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                  </div>
                  <div class="x_content">

                    <br />
                    <form id="form-berita" data-parsley-validate class="form-horizontal form-label-left">
                      
                      <input type="hidden" id="id">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_admin">Id Admin<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <!-- TAMBAH -->
                            <input type="text" class="form-control" id="id_admin" value="<?= $id_admin;?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="judul" name="judul" required="required" class="form-input form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isi_berita">Isi Berita<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea type="text" id="isi_berita" name="isi_berita" value="" required="required" class="form-input form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Gambar
                        </label>
                        <div class="custom-file col-md-8 col-sm-6 col-xs-12">
                          <input type="file" class="custom-file-input" id="file" name="file">
                          <div class="upload-area" id="uploadFile">
                            <h2>Drag and Drop file here <br /> or </br /> Click Select File</h2>

                          </div>
                        </div>
                      </div> -->
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
              $('#form-berita').on('submit', function(e) {
                e.preventDefault();
                sendDataPost();
              });

              $("html").on("drop", function(e) {
                e.preventDefault();
                e.stopPropagation();

              });

              $("html").on("dragover", function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(".upload-area>h2").text("Drag Here");
              });

              $(".upload-area").on("dragenter", function(e) {
                e.stopPropagation();
                e.preventDefault();
                $(".upload-area>h2").text("Drop");
              });

              $(".upload-area").on("dragover", function(e) {
                e.stopPropagation();
                e.preventDefault();
                $(".upload-area>h2").text("Drop");
              });

              $(".upload-area").on("drop", function(e) {
                e.preventDefault();
                e.stopPropagation();
                var file = e.originalEvent.dataTransfer.files;
                $('#file')[0].files = file;
                console.log(file);
                $('.upload-area>h2').text("File yang dipilih : " + file[0].name);

              });
              $(".upload-area").click(function() {
                $('#file').click();
              });

              $('#file').change(function() {
                var file = $('#file')[0].files[0];
                console.log(file);
                $('.upload-area>h2').text("File yang dipilih : " + file.name);
              });

              function sendDataPost() {
                var link = "<?=base_url()?>berita/create_action/";

                var dataForm = {
                  'id_admin': $('#id_admin').val(),
                  'judul': $('#judul').val(),
                  'isi_berita': $('#isi_berita').val(),
                }
                // var allInput = $('.form-input');

                // $.each(allInput, function(i, val){
                //   dataForm.append(val['name'],val['value']);
                // });

                // var file = $('#file')[0].files[0];
                // dataForm.append('file', file);
                $.ajax(link, {
                  type: 'POST',
                  data: dataForm,
                  // contentType: false,
                  // processData: false,
                  // dataType: 'json',
                  success: function(data, status, xhr) {
                    var datastr = JSON.parse(data);
                    alert(datastr['msg']);
                    loadMenu('<?= base_url('berita') ?>');
                  },
                  error: function(jqXHR, textStatus, errorMsg) {
                    alert('Error : ' + errorMsg);
                  }
                });

              }
            </script>