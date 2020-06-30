<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<!-- <h5> <small>Users</small></h5> -->
			<div class="navbar-left">
				<button type="button" class="btn btn-success" onclick="loadMenu('<?= base_url('kepkel/form_create/') . $id ?>')">Tambah Data</button>
			</div>
			<div class="title_right">
				<div class="col-md-3 col-sm-3 col-xs-12 navbar-right top_search">
					<div class="input-group">
						<input type="text" name="search" id="search" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" id="btn-search" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="table-responsive">
				<table id="table-kk" class="table table-striped jambo_table bulk_action">
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function loadKonten(url) {
			url = '<?=base_url()?>Kepkel/tableKepkel/' + url;
			$.ajax(url, {
				type: 'GET',
				success: function(data, ststus, xhr) {
					var objData = JSON.parse(data);

					$('#table-kk').html(objData.konten);
					// reload_event();
				},
				error: function(jqXHR, textStatus, errorMsg) {
					alert('Error : ' + errorMsg)
				}
			})
		}

		loadKonten('<?= $id ?>');

		$('#btn-search').on('click', function() {
			cariData();
		});

		$('#search').keyup(function() {
			var search = $(this).val();
			if (search != "") {
				cariData(search);
			} else {
				loadKonten('<?= $id ?>');
			}
		});

		function cariData(query) {
			$.ajax({
				url: '<?=base_url()?>Kepkel/cari_data',
				type: 'POST',
				data: {
					query: query
				},
				success: function(data, status, xhr) {
					var objData = JSON.parse(data);
					$('#table-kk').html(objData.konten);
					// reload_event();
				},
				error: function(jqXHR, textStatus, errorMsg) {
					alert('Error:' + errorMsg);
				}
			});

		}
	</script>