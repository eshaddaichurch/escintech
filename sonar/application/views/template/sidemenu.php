<?php
$jabatan = $this->session->userdata('jabatan');
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo (base_url()) ?>" class="brand-link navbar-navy text-light text-sm">
      <img src="<?php echo (base_url()) ?>images/sonar-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SONAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-sm">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
if (empty($this->session->userdata('foto'))) {
    $foto = base_url('images/foto-users.png');
} else {
    $foto = base_url('uploads/pengguna/' . $this->session->userdata('foto'));
}
?>
          <img src="<?php echo $foto ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a><span class="text-warning"><?php echo $this->session->userdata('jabatan'); ?></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo (site_url()) ?>" class="nav-link <?php echo ($menu == 'home') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-grip-horizontal"></i>
              <p>
                Home
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo (site_url("profilsaya")) ?>" class="nav-link <?php echo ($menu == 'profilsaya') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil Saya
              </p>
            </a>
          </li>


          <?php
$menudropdown = array("projectmanager", "pengguna", "kategori");
if (in_array($menu, $menudropdown)) {
    $dropdownselected = true;
} else {
    $dropdownselected = false;
}
?>

          <?php if ($jabatan == 'Admin') {
    ?>

          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-snowflake"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">



                  <li class="nav-item">
                    <a href="<?php echo (site_url("pengguna")) ?>" class="nav-link <?php echo ($menu == 'pengguna') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Pengguna</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="<?php echo (site_url("kategori")) ?>" class="nav-link <?php echo ($menu == 'kategori') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kategori Tugas</p>
                    </a>
                  </li>
            </ul>
          </li>


          <?php
$menudropdown = array("proyek", "proyeklist");
    if (in_array($menu, $menudropdown)) {
        $dropdownselected = true;
    } else {
        $dropdownselected = false;
    }
    ?>

          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-bezier-curve"></i>
              <p>
                Proyek
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


                  <li class="nav-item">
                    <a href="<?php echo (site_url("proyek")) ?>" class="nav-link <?php echo ($menu == 'proyek') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Proyek</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="<?php echo (site_url("proyeklist")) ?>" class="nav-link <?php echo ($menu == 'proyeklist') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Modul Proyek</p>
                    </a>
                  </li>





            </ul>
          </li>

          <?php }?>



          <li class="nav-item">
            <a href="<?php echo (site_url("task")) ?>" class="nav-link <?php echo ($menu == 'task') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Tugas / Task
              </p>
            </a>
          </li>


          <?php
$menudropdown = array("lapjadwal", "lapperkembangan");
if (in_array($menu, $menudropdown)) {
    $dropdownselected = true;
} else {
    $dropdownselected = false;
}
?>

          <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


                  <li class="nav-item">
                    <a href="<?php echo (site_url("lapjadwal")) ?>" class="nav-link <?php echo ($menu == 'lapjadwal') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Task</p>
                    </a>
                  </li>

                  <!-- <li class="nav-item">
                    <a href="<?php echo (site_url("lapperkembangan")) ?>" class="nav-link <?php echo ($menu == 'lapperkembangan') ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Perkembangan Karyawan</p>
                    </a>
                  </li> -->


            </ul>
          </li>



          <li class="nav-item">
            <a href="<?php echo (site_url('Login/keluar')) ?>" class="nav-link text-warning">
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
