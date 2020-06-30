<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<!-- <h5> <small>Users</small></h5> -->
			<div class="navbar-left">
			<button type="button" class="btn btn-success" onclick="loadMenu('<?=base_url ('apartur/form_create')?>')"><i class="fa fa-plus" style="margin-right: 2px;"></i>Tambah Data</button>
			<button type="button" class="btn btn-success" onclick="loadMenu('<?=base_url ('apartur/excell')?>')"><i class="fa fa-plus" style="margin-right: 2px;"></i>Export</button>
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
				reload_event();
			},
			error: function (jqXHR, textStatus, errorMsg) {
				alert('Error : ' + errorMsg)
			}
		})
	}

	loadKonten('<?=base_url()?>apartur/apartur_list');

	function reload_event() {
		$('.linkEdit').on('click', function () {
			var hashClean = this.hash.replace('#', '');
			loadMenu('<?=base_url('apartur/form_edit/')?>' + hashClean);
		});

		$('.linkHapus').on('click', function () {
			var hashClean = this.hash.replace('#', '');
			hapusData(hashClean);
		});
	}

	function hapusData(id_apartur) {
		var url = '<?=base_url()?>apartur/delete_data?id_apartur='+id_apartur;

		$.ajax(url, {
			type: 'GET',
			success: function (data, status, xhr) {
				var objData = JSON.parse(data);
				alert(objData['msg']);
				loadKonten('<?=base_url()?>apartur/apartur_list');
				
			},
			error: function (jqXHR, textStatus, errorMsg) {
				alert('Error:' + errorMsg);
			}
		});
	}

	$('#btn-search').on('click', function () {
		cariData();
	});

	$('#search').keyup(function () {
		var search = $(this).val();
		if(search != ""){
			cariData(search);
		}else{
			cariData();
		}
	});

	function cariData(query) {
		$.ajax({
			url: '<?=base_url()?>apartur/cari_data',
			type: 'POST',
			data: {query:query},
			success: function (data, status, xhr) {
				var objData = JSON.parse(data);
				$('#table-apartur').html(objData.konten);
				reload_event();
			},
			error: function (jqXHR, textStatus, errorMsg) {
				alert('Error:' + errorMsg);
			}
		});
		
	}

</script>
