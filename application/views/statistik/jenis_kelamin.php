<div class="float-right">
        
        <div style="display: flex;">
            <div style="width: 30px; height:10px; background:orange; margin:5px"></div>
            <div>Laki-laki</div>
        </div>
        <div style="display: flex;">
            <div style="width: 30px; height:10px; background:blue; margin:5px"></div>
            <div> Perempuan</div>
        </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center">Data Jenis Kelamin</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="" style="height:350px">
                        <canvas id="jkel-first" height="200px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center">Data Jenis Kelamin berdasarkan Dusun</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="" style="height:350px">
                        <canvas id="jkel-second" height="200px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var jkel_first = document.getElementById("jkel-first").getContext("2d");
    var data_jkel = [];
    var data_jumlah = [];
    $.post("<?= base_url("statistik/jkelData") ?>", function(data) {
        var obj = JSON.parse(data);
        $.each(obj, function(test, item) {
            data_jkel.push(item.jkel);
            data_jumlah.push(item.jum_pend);
        });

        var chart = new Chart(jkel_first, {
            type: 'pie',
            data: {
                labels: data_jkel,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    backgroundColor: [
                        'orange',
                        'blue'
                    ],
                    // borderColor: '##93C3D2',
                    data: data_jumlah,
                }],
                // labels: data_jkel,
            },
        });
    });


    var jkel_second = document.getElementById("jkel-second").getContext("2d");
    var data_laki = [];
    var data_per = [];
    var data_dusun = [];
    $.post("<?= base_url("statistik/jkelDusun") ?>", function(data) {
        var obj = JSON.parse(data);
        $.each(obj, function(test, item) {
            data_laki.push(item.jum_laki);
            data_per.push(item.jum_perempuan);
            data_dusun.push(item.nama_dsn);
        });

        var chart = new Chart(jkel_second, {
            type: 'bar',
            data: {
                labels: data_dusun,
                datasets: [{
                    label: 'Laki-laki',
                    backgroundColor: 'orange',
                    // borderColor: '##93C3D2',
                    data: data_laki,
                },
                {
                    label: 'Perempuan',
                    backgroundColor: 'blue',
                    // borderColor: '##93C3D2',
                    data: data_per,
                }
            ],
                // labels: data_jkel,
            },
        });
    });

    
</script>