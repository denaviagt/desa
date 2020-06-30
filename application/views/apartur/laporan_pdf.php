<!DOCTYPE html>
<html><head>
    <title>Laporan Apartur</title>
    <link href="<?=base_url('assets/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="table-responsive">
                    <table id="table-apartur" class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">ID Aparatur </th>
                                <th class="column-title">Nama </th>
                                <th class="column-title">Jabatan </th>
                                <th class="column-title">Jenis Kelamin </th>
                            </tr>
                        </thead>
                        <?php foreach ($apartur->result() as $key => $value) { ?>
                            <tr class="even pointer">
                                <td class="text-center"><?=$value->id_apartur?></td>
                                <td><?=$value->nama?></td>
                                <td><?=$value->jabatan?></td>
                                <td><?=$value->jkel?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
</body></html>