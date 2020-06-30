   <!-- footer content -->
   <footer>
      <div class="pull-right">
         Copyright &copy; 2020 Jogotirto Site - Anggita Denavia
      </div>
      <div class="clearfix"></div>
   </footer>
   <!-- /footer content -->
   </div>
   </div>

   <!-- jQuery -->
   <script src="<?= base_url('assets/') ?>vendors/jquery/dist/jquery.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <!-- Bootstrap -->
   <script src="<?= base_url('assets/') ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- FastClick -->
   <script src="<?= base_url('assets/') ?>vendors/fastclick/lib/fastclick.js"></script>
   <!-- Chart.js -->
   <script src="<?= base_url('assets/') ?>vendors/Chart.js/dist/Chart.min.js"></script>
   <!-- gauge.js -->
   <script src="<?= base_url('assets/') ?>vendors/gauge.js/dist/gauge.min.js"></script>
   <!-- bootstrap-progressbar -->
   <script src="<?= base_url('assets/') ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
   <!-- iCheck -->
   <script src="<?= base_url('assets/') ?>vendors/iCheck/icheck.min.js"></script>
   <!-- DateJS -->
   <script src="<?= base_url('assets/') ?>vendors/DateJS/build/date.js"></script>
   <!-- bootstrap-daterangepicker -->
   <script src="<?= base_url('assets/') ?>vendors/moment/min/moment.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
   <!-- bootstrap-datetimepicker -->
   <script src="<?= base_url('assets/') ?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

   <!-- jquery.inputmask -->
   <script src="<?= base_url('assets/') ?>vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

   <!-- Custom Theme Scripts -->
   <script src="<?= base_url('assets/') ?>build/js/custom.min.js"></script>

   <script type="text/javascript">
      function loadMenu(url) {
         $.ajax(url, {
            type: 'GET',
            success: function(data, ststus, xhr) {
               //console.log(data);
               //return false;
               let objData = JSON.parse(data);

               $('#isiKonten').html(objData.konten);
               $('title').html(objData.title);
               $('.title-halaman').html(objData.title);
               // loadEvent();
            },
            error: function(jqXHR, textStatus, errorMsg) {
               alert('Error : ' + errorMsg);
            }
         })
      }

      $('.count').each(function() {
         $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
         }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
               $(this).text(Math.ceil(now));
            }
         });
      });

      var myLine = document.getElementById("canvas-penduduk").getContext("2d");
      var data_dusun = [];
      var total = [];
      var menikah = [];
      var belum_menikah = [];
      var perempuan = [];
      var laki = [];
      $.post("<?= base_url("home/getAllDusun") ?>", function(data) {
         var obj = JSON.parse(data);
         $.each(obj, function(test, item) {
            data_dusun.push(item.nama_dsn);
            total.push(item.total);
            menikah.push(item.menikah);
            belum_menikah.push(item.belum_menikah);
            perempuan.push(item.jum_perempuan);
            laki.push(item.jum_laki);
         });

         var chart = new Chart(myLine, {
            type: 'bar',
            data: {
               labels: data_dusun,
               datasets: [{
                  type: 'line',
                  label: 'Total Penduduk',
                  data: total,
                  backgroundColor: 'orange',
                  borderColor: 'orange',
                  fill: false,
                  borderDash: [5, 5],
                  pointRadius: 15,
                  pointHoverRadius: 10,
               }, {
                  type: 'line',
                  label: 'Menikah',
                  data: menikah,
                  backgroundColor: 'blue',
                  borderColor: 'blue',
                  fill: false,
                  borderDash: [5, 2],
                  pointRadius: [2, 4, 6, 18, 0, 12, 20],
                  pointHoverRadius: 20,
               }, {
                  type: 'line',
                  label: 'Belum Menikah',
                  data: belum_menikah,
                  backgroundColor: 'green',
                  borderColor: 'green',
                  fill: false,
                  pointHoverRadius: 30,
               }, {
                  type: 'bar',
                  label: 'Perempuan',
                  data: perempuan,
                  backgroundColor: 'yellow',
                  borderColor: 'yellow',
                  fill: false,
                  pointHitRadius: 20,
                  pointHoverRadius: 15,
               }, {
                  type: 'bar',
                  label: 'Laki-laki',
                  data: laki,
                  backgroundColor: 'red',
                  borderColor: 'red',
                  fill: false,
                  pointHitRadius: 20,
                  pointHoverRadius: 10,
               }]
            },

         });
      });
   </script>

   </body>

   </html>