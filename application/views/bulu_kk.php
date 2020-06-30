<!DOCTYPE html>
<html>

<head>
	<title>Cara Membuat Grafik dengan CodeIgniter dengan Chart.js</title>
	<!-- Load file plugin Chart.js -->
	<script src="<?= base_url('assets/') ?>vendors/Chart.js/dist/Chart.min.js"></script>
</head>

<body>
	<br>
	<h4>Cara Membuat Grafik dengan CodeIgniter dengan Chart.js</h4>
	<canvas id="canvas-jkel" width="1000" height="280">
	</canvas>
	<?php
	$jkel = "";
	$jum_pend = "";
	if (is_array($hasil) || is_object($hasil)) {
		# code...
		foreach ($hasil as $data) {
			$jk = $data->jkel;
			$jkel .= "'$jk'" . ",";
			$jum = $data->jum_pend;
			$jum_pend .= "$jum" . ",";
		}
	}
	?>
	<script>
		 var myLine = document.getElementById("canvas-jkel").getContext("2d");
      var chart = new Chart(myLine, {
         type: 'bar',
         data: {
            labels: [
               <?php echo $jkel;?>
            ],
            datasets: [{
               label: 'Jumlah Penduduk',
               backgroundColor: '#ADD8E6',
               borderColor: '##93C3D2',
               data: [
                  <?php echo $jum_pend;?>
               ]
            }]
         },
		 options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
      });

	</script>
</body>

</html>