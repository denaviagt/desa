
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="" onclick="loadMenu('<?= base_url('home/index') ?>')" class="site_title"><i class="glyphicon glyphicon-leaf"></i> <span>Desa Jogotirto</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <!-- TAMBAH -->
            <img src="<?= base_url('assets/img/'.$admin['foto']); ?>" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info" style="width:100%">
            <span>Admin,</span>
            <h2><?= $this->session->userdata('nama_admin') ?></h2>
            <!-- <span>Online</span> -->
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>Data</h3>
            <ul class="nav side-menu">
              <li><a href="#" onclick="loadMenu('<?= base_url('apartur') ?>')"><i class="fa fa-file-text"></i> Data Aparatur Desa</a></li>
              <li><a href="#"><i class="fa fa-file-text"></i> Data Penduduk <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu ">
                  <li><a href="#" class="dropdownlink" id="Blambangan" onclick="loadMenu('<?= base_url('penduduk/list/1') ?>')">Blambangan</a></li>
                  <li><a href="#" class="dropdownlink" id="Bulu" onclick="loadMenu('<?= base_url('penduduk/list/2') ?>')">Bulu</a></li>
                  <li><a href="#" class="dropdownlink" id="Krasaan" onclick="loadMenu('<?= base_url('penduduk/list/8') ?>')">Krasaan</a></li>
                  <li><a href="#" class="dropdownlink" id="Rejosari" onclick="loadMenu('<?= base_url('penduduk/list/9') ?>')">Rejosari</a></li>
                  <li><a href="#" class="dropdownlink" id="Morobangun" onclick="loadMenu('<?= base_url('penduduk/list/10') ?>')">Morobangun</a></li>
                  <li><a href="#" class="dropdownlink" id="Jlatren" onclick="loadMenu('<?= base_url('penduduk/list/3') ?>')">Jlatren</a></li>
                  <li><a href="#" class="dropdownlink" id="Jranggung" onclick="loadMenu('<?= base_url('penduduk/list/4') ?>')">Jranggung</a></li>
                  <li><a href="#" class="dropdownlink" id="Karongan" onclick="loadMenu('<?= base_url('penduduk/list/5') ?>')">Karongan</a></li>
                  <li><a href="#" class="dropdownlink" id="Kranggan1" onclick="loadMenu('<?= base_url('penduduk/list/6') ?>')">Kranggan I</a></li>
                  <li><a href="#" class="dropdownlink" id="Kranggan2" onclick="loadMenu('<?= base_url('penduduk/list/7') ?>')">Kranggan II</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-file-text"></i> Data KK <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">

                  <li><a href="#" class="dropdownlink" id="kkBlambangan" onclick="loadMenu('<?= base_url('kepkel/list/1') ?>')">Blambangan</a></li>
                  <li><a href="#" class="dropdownlink" id="kkBulu" onclick="loadMenu('<?= base_url('kepkel/list/2') ?>')">Bulu</a></li>
                  <li><a href="#" class="dropdownlink" id="kkJlatren" onclick="loadMenu('<?= base_url('kepkel/list/3') ?>')">Jlatren</a></li>
                  <li><a href="#" class="dropdownlink" id="kkJranggung" onclick="loadMenu('<?= base_url('kepkel/list/4') ?>')">Jranggung</a></li>
                  <li><a href="#" class="dropdownlink" id="kkKarongan" onclick="loadMenu('<?= base_url('kepkel/list/5') ?>')">Karongan</a></li>
                  <li><a href="#" class="dropdownlink" id="kkKranggan1" onclick="loadMenu('<?= base_url('kepkel/list/6') ?>')">Kranggan I</a></li>
                  <li><a href="#" class="dropdownlink" id="kkKranggan2" onclick="loadMenu('<?= base_url('kepkel/list/7') ?>')">Kranggan II</a></li>
                  <li><a href="#" class="dropdownlink" id="kkKrasaan" onclick="loadMenu('<?= base_url('kepkel/list/8') ?>')">Krasaan</a></li>
                  <li><a href="#" class="dropdownlink" id="kkRejosari" onclick="loadMenu('<?= base_url('kepkel/list/9') ?>')">Rejosari</a></li>
                  <li><a href="#" class="dropdownlink" id="kkMorobangun" onclick="loadMenu('<?= base_url('kepkel/list/10') ?>')">Morobangun</a></li>

                </ul>
              </li>
              <li><a href="#" onclick="loadMenu('<?= base_url('Data_rt') ?>')"><i class="fa fa-file-text"></i> Data RT</a>
              </li>
            </ul>
            <h3>Laporan</h3>
            <ul class="nav side-menu">
              <li><a href="#" onclick="loadMenu('<?= base_url('Administratif') ?>')"><i class="fa fa-clone"></i> Laporan Administratif</a>
              </li>
              <li><a><i class="fa fa-bar-chart"></i>Laporan Statistik <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#" onclick="loadMenu('<?= base_url('Statistik/Jeniskelamin') ?>')">Jenis Kelamin</a></li>
                  <li><a href="#" onclick="loadMenu('<?= base_url('Statistik/Usia') ?>')">Usia Penduduk</a></li>
                  <li><a href="#" onclick="loadMenu('<?= base_url('Statistik/Agama') ?>')">Agama</a></li>
                  <li><a href="#" onclick="loadMenu('<?= base_url('Statistik/Pendidikan') ?>')">Pendidikan</a></li>
                </ul>
              </li>
            </ul>
            <h3>Berita</h3>
            <ul class="nav side-menu">
              <li><a href="#" onclick="loadMenu('<?= base_url('Berita') ?>')"><i class="fa fa-clone"></i>Berita</span></a></li>
            </ul>
          </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('login/logout') ?>">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav justify-content-end">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav" style="float: right;margin-right: auto;">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="<?= base_url('assets/img/dzawin.jpg') ?>" alt="">
                <?= $this->session->userdata('nama_admin') ?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">

                <li><a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>
            <div class="clearfix"></div>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="page-title">
        <div class="title_left">
          <h3 class="title-halaman"></h3>
        </div>
      </div>

      <div class="clearfix"></div>
      <div id="isiKonten">
        <div class="row top_tiles bg">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats text-center" id="tile-penduduk">
              <div class="count"><?= $penduduk ?></div>
              <h3>Penduduk</h3>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats text-center" id="tile-kk">
              <!-- <div class="icon"><i class="fa fa-comments-o"></i></div> -->

              <div class="count"><?= $kk ?></div>
              <h3>Kepala Keluarga</h3>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats text-center" id="tile-dusun">
              <!-- <div class="icon"><i class="fa fa-sort-amount-desc"></i></div> -->
              <div class="count"><?= $dusun ?></div>
              <h3>Dusun</h3>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="tile-stats text-center" id="tile-aparatur">
              <!-- <div class="icon"><i class="fa fa-check-square-o"></i></div> -->
              <div class="count"><?= $aparatur ?></div>
              <h3>Aparatur Desa</h3>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Statistika Penduduk Desa Jogotirto</h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="" style="height:350px">
                    <canvas id="canvas-penduduk" height="130px"></canvas>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="nav navbar-left">Keterangan : </div>
              <div class="nav navbar-right " style="display: flex;">
                  <div style="display: flex;">
                    <div style="width: 30px; height:10px; background:orange; margin:5px 10px"></div>
                    <div>Total Penduduk</div>
                  </div>
                  <div style="display: flex;">
                    <div style="width: 30px; height:10px; background:blue; margin:5px 10px"></div>
                    <div> Menikah</div>
                  </div>
                  <div style="display: flex;">
                    <div style="width: 30px; height:10px; background:green; margin:5px 10px"></div>
                    <div>Belum Menikah</div>
                  </div>
                  <div style="display: flex;">
                    <div style="width: 30px; height:10px; background:yellow; margin:5px 10px"></div>
                    <div> Perempuan</div>
                  </div>
                  <div style="display: flex;">
                    <div style="width: 30px; height:10px; background:red; margin:5px 10px"></div>
                    <div> Laki-laki</div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12" >
            <div class="x_panel" style="height: 460px;">
              <div class="x_title">
                <h2>Berita Terbaru</h2>
                <div class="clearfix"></div>
              </div>
              <ul class="list-unstyled top_profiles scroll-view">
                <?php foreach ($berita->result() as $key) { ?>
                  <li class="media event row">
                    <div class="pull-left" style="line-height: 70px">
                      <i class="fa fa-asterisk aero"></i>
                    </div>
                    <div class="media-body">
                      <h5 class="title" href="#"><?= $key->judul ?></h5>
                      <p> <small><?= $key->tanggal ?></small>
                      </p>
                    </div>
                  </li>
                  
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- /page content -->