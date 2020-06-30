<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">

            </div>
            <div class="x_content">

                <br />
                <form id="form-kk" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" id="id_dusun" name="id_dusun" required="required" class="form-input form-control col-md-7 col-xs-12" value="<?= $id ?>">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No RT<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="id_rt" required="required" placeholder="Masukkan id_rt">
                                <?php foreach ($rt->result() as $key => $value) : ?>
                                    <option value="<?= $value->id_rt ?>"><?= $value->no_rt ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kk">Np KK<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="no_kk" name="no_kk" required="required" class="form-input form-control col-md-7 col-xs-12" placeholder="Masukkan No KK">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kk">Nama Kepala Keluarga<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama_kk" name="nama_kk" required="required" class="form-input form-control col-md-7 col-xs-12" placeholder="Masukkan Nama">
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
    $('#form-kk').on('submit', function(e) {
        e.preventDefault();
        sendDataPost();
    });

    $('#btn-batal').on('click', function(e) {
        loadMenu('<?= base_url('kepkel/list/') . $id ?>');
    });

    function sendDataPost($id) {

        var link = '<?=base_url()?>kepkel/create_action/';

        var dataForm = {
            id_dusun: $('#id_dusun').val(),
            no_kk: $('#no_kk').val(),
            id_rt: $('#id_rt').val(),
            nama_kk: $('#nama_kk').val(),
        }
        $.ajax(link, {
            type: 'POST',
            data: dataForm,
            success: function(data, status, xhr) {
                var data_str = JSON.parse(data);
                alert(data_str['msg']);
                loadMenu('<?= base_url('kepkel/list/') . $id ?>');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        });
    }
</script>