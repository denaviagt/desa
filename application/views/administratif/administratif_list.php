<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<!-- <h5> <small>Users</small></h5> -->
			<div class="table-responsive">
				<table id="table-apartur" class="table table-striped jambo_table bulk_action">
				</table>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	function loadKonten2(url) {
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

	loadKonten2('<?=base_url()?>administratif/administratif_list');

</script>
