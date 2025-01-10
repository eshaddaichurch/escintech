<style>

</style>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo(base_url()) ?>" class="brand-link">
      <img src="<?php echo(base_url()) ?>assets/adminlte/dist/img/logoesc.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EL SHADDAI CHURCH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-sm">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $this->session->userdata('foto'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('namapanggilan'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo(site_url()) ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>


          <?php  
            $menudropdown = array("infogereja", "pageskategori", "pages", "frontmenus");
            


            if (in_array($menu, $menudropdown)) { 
              $dropdownselected = true;
            }else{
              $dropdownselected = false;
            }
          ?>


          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Management Front End
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>


            <ul class="nav nav-treeview">              
                  
                  <li class="nav-item">
                    <a href="<?php echo(site_url("infogereja")) ?>" class="nav-link <?php echo ($menu=='infogereja') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Informasi Gereja</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("pageskategori")) ?>" class="nav-link <?php echo ($menu=='pageskategori') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kategori Page/ Halaman</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("pages")) ?>" class="nav-link <?php echo ($menu=='pages') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Page/ Halaman</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("frontmenus")) ?>" class="nav-link <?php echo ($menu=='frontmenus') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kelola Menu</p>
                    </a>
                  </li>
                  


            </ul>
          </li>


          <?php  
            $menudropdown = array("jemaat", "pengkhotbah", "disciplescommunity", "group", "departement", "pengkhotbah2"," jadwalibadah", "dcmember", "hagah", "otorisasi");
            if (in_array($menu, $menudropdown)) {
              $dropdownselected = true;
            }else{
              $dropdownselected = false;
            }
          ?>

          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
                  
                  <li class="nav-item">
                    <a href="<?php echo(site_url("jemaat")) ?>" class="nav-link <?php echo ($menu=='jemaat') ? 'active' : '' ?>">
                      <i class="fas fa-users"></i>
                      <p>Jemaat</p>
                    </a>
                  </li>
              

                  <li class="nav-item">
                    <a href="<?php echo(site_url("pengkhotbah2")) ?>" class="nav-link <?php echo ($menu=='pengkhotbah2') ? 'active' : '' ?>">
                    <i class="fas fa-user na-icon"></i>
                      <p>Pengkhotbah</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="<?php echo(site_url("group")) ?>" class="nav-link <?php echo ($menu=='group') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Group</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("departement")) ?>" class="nav-link <?php echo ($menu=='departement') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Departement</p>
                    </a>
                  </li>



                  
                <?php  
                  $menudropdown = array("disciplescommunity", "dcmember");
                  if (in_array($menu, $menudropdown)) {
                    $dropdownselected = true;
                  }else{
                    $dropdownselected = false;
                  }
                ?>
                
            <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
                  <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Disciples Community
                      <i class="right far fa-angle-left"></i>
                    </p>
                  </a>
                      <ul class="nav nav-treeview"> 

                        <li class="nav-item">
                          <a href="<?php echo(site_url("disciplescommunity")) ?>" class="nav-link <?php echo ($menu=='disciplescommunity') ? 'active' : '' ?>">
                          <i class="fas fa-address-book nac-icon"  ></i>
                            <p>  List Data DC</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="<?php echo(site_url("dcmember")) ?>" class="nav-link <?php echo ($menu=='dcmember') ? 'active' : '' ?>">
                          <i class="fas fa-user-friends nav-icon"></i>
                            <p>DC Member</p>
                          </a>
                        </li>

                       </ul> 
            </li>  


            <li class="nav-item">
              <a href="<?php echo(site_url("hagah")) ?>" class="nav-link <?php echo ($menu=='hagah') ? 'active' : '' ?>">
                <i class="fas fa-book"></i>
                <p>Hagah</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?php echo(site_url("otorisasi")) ?>" class="nav-link <?php echo ($menu=='otorisasi') ? 'active' : '' ?>">
                <i class="fas fa-book"></i>
                <p>Otorisasi Sistem</p>
              </a>
            </li>


            </ul>
          </li>
          


          <?php  
            $menudropdown = array("penjadwalan", "pengajuanjadwal", "konfirmasijadwal");
            if (in_array($menu, $menudropdown)) {
              $dropdownselected = true;
            }else{
              $dropdownselected = false;
            }
          ?>

          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Penjadwalan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
                  
                  <li class="nav-item">
                    <a href="<?php echo(site_url("penjadwalan")) ?>" class="nav-link <?php echo ($menu=='penjadwalan') ? 'active' : '' ?>">
                      <i class="fas fa-users"></i>
                      <p>Kalender </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("pengajuanjadwal")) ?>" class="nav-link <?php echo ($menu=='pengajuanjadwal') ? 'active' : '' ?>">
                      <i class="fas fa-users"></i>
                      <p>Pengajuan Jadwal </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("konfirmasijadwal")) ?>" class="nav-link <?php echo ($menu=='konfirmasijadwal') ? 'active' : '' ?>">
                      <i class="fas fa-users"></i>
                      <p>Konfirmasi Jadwal </p>
                    </a>
                  </li>
              




            </ul>
          </li>




          <?php  
            $menudropdown = array("KL001", "KL002", "KL003", "KL004", "KL005", "KL006","KL007", "KL008");
            if (in_array($menu, $menudropdown)) {
              $dropdownselected = true;
            }else{
              $dropdownselected = false;
            }
          ?>

          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Next Step
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
                  
                  <li class="nav-item">
                    <a href="<?php echo(site_url("konfirmasikelas/")) ?>" class="nav-link <?php echo ($menu=='konfirmasikelas') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Konfirmasi Pendaftaran</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL001")) ?>" class="nav-link <?php echo ($menu=='KL001') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Membership Class </p>
                    </a>
                  </li>
              

                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL002")) ?>" class="nav-link <?php echo ($menu=='KL002') ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                      <p>Foundation Class 1</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL003")) ?>" class="nav-link <?php echo ($menu=='KL003') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Foundation Class 2</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL004")) ?>" class="nav-link <?php echo ($menu=='KL004') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Foundation Class 3</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL005")) ?>" class="nav-link <?php echo ($menu=='KL005') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Grade 1</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL006")) ?>" class="nav-link <?php echo ($menu=='KL006') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Grade 2</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL007")) ?>" class="nav-link <?php echo ($menu=='KL007') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Grade 3</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL008")) ?>" class="nav-link <?php echo ($menu=='KL008') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Folunteer Class</p>
                    </a>
                  </li>

                  
                <!-- <?php  
                  $menudropdown = array("disciplescommunity", "dcmember");
                  if (in_array($menu, $menudropdown)) {
                    $dropdownselected = true;
                  }else{
                    $dropdownselected = false;
                  }
                ?> -->
                



            </ul>
          </li>

         

         <?php  
            $menudropdown = array("KL101");
            if (in_array($menu, $menudropdown)) {
              $dropdownselected = true;
            }else{
              $dropdownselected = false;
            }
          ?>

          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Care
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
                  
                  <li class="nav-item">
                    <a href="<?php echo(site_url("registrasikelas/index/KL101")) ?>" class="nav-link <?php echo ($menu=='KL101') ? 'active' : '' ?>">
                      <i class="fas fa-users"></i>
                      <p>Marriage Class (MAC) </p>
                    </a>
                  </li>
              

            </ul>
          </li>


          <li class="nav-item">
            <a href="<?php echo(site_url('login/keluar')) ?>" class="nav-link text-warning">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
