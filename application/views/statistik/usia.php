<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center">Data Usia Penduduk</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="" style="height:150">
                        <canvas id="canvas-umur" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var myLine = document.getElementById("canvas-umur").getContext("2d");
    var data_umur = [];
    var data_jumlah = [];
    $.post("<?= base_url("statistik/getUsia") ?>", function(data) {
        var obj = JSON.parse(data);
        $.each(obj, function(test, item) {
            data_umur.push(item.Umur);
            data_jumlah.push(item.jumlah);
        });

        var chart = new Chart(myLine, {
            type: 'line',
            data: {
                labels: data_umur,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    backgroundColor: 'cadetblue',
                    borderColor: '##93C3D2',
                    data: data_jumlah,
                }]
            },
            options: {
                scales: {
                    xAxis: [{
                        ticks: {
                            type: 'linear',
                            stepSize: 20
                        }
                    }]
                }
            }
        });
    });
</script>