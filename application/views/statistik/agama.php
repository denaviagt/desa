<div>
        
        <div style="display: flex;">
            <div style="width: 30px; height:10px; background:green; margin:5px"></div>
            <div>Islam</div>
        </div>
        <div style="display: flex;">
            <div style="width: 30px; height:10px; background:red; margin:5px"></div>
            <div> Kristen</div>
        </div>
        <div style="display: flex;">
            <div style="width: 30px; height:10px; background:blue; margin:5px"></div>
            <div> Hindu</div>
        </div>
        <div style="display: flex;">
            <div style="width: 30px; height:10px; background:yellow; margin:5px"></div>
            <div> Budha</div>
        </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-center">Data Agama Penduduk</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="" style="height:150">
                        <canvas id="canvas-agama" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var agamaFirst = document.getElementById("canvas-agama").getContext("2d");
    var data_agama = [];
    var data_jumlah = [];
    $.post("<?= base_url("statistik/getAgama") ?>", function(data) {
        var obj = JSON.parse(data);
        $.each(obj, function(test, item) {
            data_agama.push(item.agama);
            data_jumlah.push(item.jum_pend);
        });

        var chart = new Chart(agamaFirst, {
            type: 'pie',
            data: {
                labels: data_agama,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    backgroundColor: ['green', 'red', 'blue', 'yellow'],
                    borderColor: '#93C3D2',
                    data: data_jumlah,
                }]
            },
        });
    });
</script>
