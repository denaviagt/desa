<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<!-- <h5> <small>Users</small></h5> -->
			<button type="button" class="btn btn-success">Tambah Data</button>
			<div class="table-responsive">
				<table id="table-apartur" class="table table-striped jambo_table bulk_action">
				</table>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	function loadKonten(url) {
		$.ajax(url, {
			type: 'GET',
			success: function (data, ststus, xhr) {
				var objData = JSON.parse(data); 

				$('#table-apartur').html(objData.konten);
			},
			error: function (jqXHR, textStatus, errorMsg) {
				alert('Error : ' + errorMsg)
			}
		})
	}

	loadKonten('http://localhost/kuliah/Desa/apartur/apartur_list');

</script>