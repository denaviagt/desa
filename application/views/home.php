
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Desa Jogotirto</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <h2>John Doe</h2>
                <span>Online</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="#" onclick="loadMenu('<?=base_url ('apartur')?>')"><i class="fa fa-edit"></i> Data Aparatur Desa</a></li>
                  <!-- <li><a href="#" onclick="loadDropdown('<?=base_url('dropdown')?>')" ><i class="fa fa-home"></i> Data Penduduk <span class="fa fa-chevron-down"></span></a> -->
                  <li><a href="#"><i class="fa fa-home"></i> Data Penduduk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu ">
                      <li><a href="#" class="dropdownlink" id="Blambangan" onclick="loadMenu('<?=base_url ('penduduk/blambangan')?>')">Blambangan</a></li>
                      <li><a href="#" class="dropdownlink" id="Bulu" onclick="loadMenu('<?=base_url ('penduduk/bulu')?>')">Bulu</a></li>
                      <li><a href="#" class="dropdownlink" id="Jlatren" onclick="loadMenu('<?=base_url ('penduduk/jlatren')?>')">Jlatren</a></li>
                      <li><a href="#" class="dropdownlink" id="Jranggung" onclick="loadMenu('<?=base_url ('penduduk/jragung')?>')">Jranggung</a></li>
                      <li><a href="#" class="dropdownlink" id="Karongan" onclick="loadMenu('<?=base_url ('penduduk/karongan')?>')">Karongan</a></li>
                      <li><a href="#" class="dropdownlink" id="Kranggan1" onclick="loadMenu('<?=base_url ('penduduk/kranggan1')?>')">Kranggan I</a></li>
                      <li><a href="#" class="dropdownlink" id="Kranggan2" onclick="loadMenu('<?=base_url ('penduduk/kranggan2')?>')">Kranggan II</a></li>
                      <li><a href="#" class="dropdownlink" id="Krasaan" onclick="loadMenu('<?=base_url ('penduduk/krasaan')?>')">Krasaan</a></li>
                      <li><a href="#" class="dropdownlink" id="Rejosari" onclick="loadMenu('<?=base_url ('penduduk/rejosari')?>')">Rejosari</a></li>
                      <li><a href="#" class="dropdownlink" id="Morobangun" onclick="loadMenu('<?=base_url ('penduduk/morobangun')?>')">Morobangun</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> Data KK <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="#" class="dropdownlink" id="kkBlambangan" onclick="loadMenu('<?=base_url ('kepkel')?>')">Blambangan</a></li>
                      <li><a href="#" class="dropdownlink" id="kkBulu" onclick="loadMenu('<?=base_url ('kepkel/bulu')?>')">Bulu</a></li>
                      <li><a href="#" class="dropdownlink" id="kkJlatren" onclick="loadMenu('<?=base_url ('kepkel/jlatren')?>')">Jlatren</a></li>
                      <li><a href="#" class="dropdownlink" id="kkJranggung" onclick="loadMenu('<?=base_url ('kepkel/jragung')?>')">Jranggung</a></li>
                      <li><a href="#" class="dropdownlink" id="kkKarongan" onclick="loadMenu('<?=base_url ('kepkel/karongan')?>')">Karongan</a></li>
                      <li><a href="#" class="dropdownlink" id="kkKranggan1" onclick="loadMenu('<?=base_url ('kepkel/kranggan1')?>')">Kranggan I</a></li>
                      <li><a href="#" class="dropdownlink" id="kkKranggan2" onclick="loadMenu('<?=base_url ('kepkel/kranggan2')?>')">Kranggan II</a></li>
                      <li><a href="#" class="dropdownlink" id="kkKrasaan" onclick="loadMenu('<?=base_url ('kepkel/krasaan')?>')">Krasaan</a></li>
                      <li><a href="#" class="dropdownlink" id="kkRejosari" onclick="loadMenu('<?=base_url ('kepkel/rejosari')?>')">Rejosari</a></li>
                      <li><a href="#" class="dropdownlink" id="kkMorobangun" onclick="loadMenu('<?=base_url ('kepkel/morobangun')?>')">Morobangun</a></li>
                        
                    </ul>
                  </li>
                  <li><a href="#" onclick="loadMenu('<?=base_url ('Data_rt')?>')"><i class="fa fa-table"></i> Data RT</a>
                  </li>
                  <li><a href="#" onclick="loadMenu('<?=base_url ('Administratif')?>')"><i class="fa fa-bar-chart-o"></i> Laporan Administratif <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Laporan Statistik <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Jenis Kelamin</a></li>
                      <li><a href="#">Usia Penduduk</a></li>
                      <li><a href="#">Agama</a></li>
                      <li><a href="#">Pendidikan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Berita</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="images/img.jpg" alt=""> -->
                    John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" >
          <div class="page-title">
              <div class="title_left">
                <h3 class="title-halaman">Typography</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div id="isiKonten"></div>

            
        </div>
        <!-- /page content -->

       