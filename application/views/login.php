    <div class="login">
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="formLogin">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" href="#">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div>
                  <h1><i class="fa fa-paw"></i> Jogotirto Site</h1>
                  <p>©2020 Anggita Denavia</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/') ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $('#formLogin').on('submit', function(e) {
        e.preventDefault();
        checkLogin();
      });

      function checkLogin() {
        var link = "<?=base_url()?>login/checkLogin";

        var dataForm = {};
        var all_input = $('.form-control');

        $.each(all_input, function(i, val) {
          dataForm[val['name']] = val['value'];
        });

        // console.log(dataForm); exit;

        $.ajax(link, {
          type: 'POST',
          data: dataForm,
          success: function(data, status, xhr) {
            var data_str = JSON.parse(data);


            if (data_str['sukses'] == 'Ya') {
              setSession(data_str['admin'])
            }else{
            alert(data_str['msg']);

            }
          },
          error: function(jqXHR, textStatus, errorMsg) {
            alert('Error : ' + errorMsg);
          }
        })
      }

      function setSession(admin) {
        var link = "<?=base_url()?>login/setSession";

        var dataForm = {};
        dataForm['id_admin'] = admin['id_admin'];
        dataForm['username'] = admin['username'];
        dataForm['nama_admin'] = admin['nama_admin'];
        dataForm['telp'] = admin['telp'];

        $.ajax(link, {
          type: 'POST',
          data: dataForm,
          success: function(data, status, xhr) {
            location.replace("<?=base_url()?>home");
          },
          error: function(jqXHR, textStatus, errorMsg) {
            alert('Error : ' + errorMsg);
          }
        })

      }
    </script>
    </body>

    </html> 