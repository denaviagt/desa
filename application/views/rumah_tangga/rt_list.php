<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<!-- <h5> <small>Users</small></h5> -->
			<div class="table-responsive">
				<table id="table-penduduk" class="table table-striped jambo_table bulk_action">
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

				$('#table-penduduk').html(objData.konten);
			},
			error: function (jqXHR, textStatus, errorMsg) {
				alert('Error : ' + errorMsg)
			}
		})
	}

	loadKonten('<?=base_url()?>Data_rt/rt_list');

</script>
