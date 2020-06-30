<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center">Data Pendidikan Penduduk</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="" style="height:150">
                        <canvas id="canvas-pendidikan" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var cvsPendidikan = document.getElementById("canvas-pendidikan").getContext("2d");
    var data_pendidikan = [];
    var data_jumlah = [];
    $.post("<?= base_url("statistik/get_pendidikan") ?>", function(data) {
        var obj = JSON.parse(data);
        $.each(obj, function(test, item) {
            data_pendidikan.push(item.pendidikan);
            data_jumlah.push(item.jumlah);
        });

        var chart = new Chart(cvsPendidikan, {
            type: 'horizontalBar',
            data: {
                labels: data_pendidikan,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    backgroundColor: ['green', 'red', 'blue', 'yellow', 'purple', 'pink'],
                    borderColor: '#93C3D2',
                    data: data_jumlah,
                }]
            },
        });
    });
</script>
