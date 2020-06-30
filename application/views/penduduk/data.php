
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<!-- <h5> <small>Users</small></h5> -->
			<div class="navbar-left">
				<button type="button" class="btn btn-success" onclick="loadMenu('<?= base_url('penduduk/form_create/') . $id ?>')">Tambah Data</button>
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
			<div class="pagination-link"></div>
			<div class="table-responsive">
				<table id="table-penduduk" class="table table-striped jambo_table bulk_action">
				</table>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		function loadKonten(url) {
			url = "<?=base_url()?>penduduk/tablePenduduk/" + url ;
			$.ajax(url, {
				type: 'GET',
				success: function(data, ststus, xhr) {
					var objData = JSON.parse(data);
					// $('.pagination-link').html(objData.pagination);
					$('#table-penduduk').html(objData.konten);
					reload_event();
				},
				error: function(jqXHR, textStatus, errorMsg) {
					alert('Error : ' + errorMsg)
				}
			})
		}

		loadKonten('<?= $id ?>');

		function reload_event() {
			$('.linkEdit').on('click', function() {
				var hashClean = this.hash.replace('#', '');
				loadMenu('<?= base_url('penduduk/form_edit/') ?>' + hashClean+'-'+ <?= $id ?>);
			});

			$('.linkHapus').on('click', function() {
				var hashClean = this.hash.replace('#', '');
				hapusData(hashClean);
			});
		}

		function hapusData(nik) {
			var url = '<?=base_url()?>penduduk/delete_data?nik=' + nik;

			$.ajax(url, {
				type: 'GET',
				success: function(data, status, xhr) {
					var objData = JSON.parse(data);
					alert(objData['msg']);
					loadKonten('<?= $id ?>');

				},
				error: function(jqXHR, textStatus, errorMsg) {
					alert('Error : ' + errorMsg)
				}
			});
		}

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

		function cariData(query, id) {

			$.ajax({
				url: '<?=base_url()?>penduduk/cari_data',
				type: 'POST',
				data: {
					query: query
				},
				success: function(data, status, xhr) {
					var objData = JSON.parse(data);
					$('#table-penduduk').html(objData.konten);
					reload_event();
				},
				error: function(jqXHR, textStatus, errorMsg) {
					alert('Error:' + errorMsg);
				}
			});

		}
	</script>