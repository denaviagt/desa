<button type="button" class="btn btn-success" onclick="loadMenu('<?= base_url('Berita/form_create') ?>')">Tambah Berita</button>
<br>
<div class="konten-berita">
</div>

<script>
  function loadBerita(url) {
    $.ajax(url, {
      type: 'GET',
      success: function(data, ststus, xhr) {
        var objData = JSON.parse(data);

        $('.konten-berita').html(objData.konten);
      },
      error: function(jqXHR, textStatus, errorMsg) {
        alert('Error : ' + errorMsg)
      }
    })
  }
  loadBerita('<?= base_url() ?>berita/list_berita');
</script>