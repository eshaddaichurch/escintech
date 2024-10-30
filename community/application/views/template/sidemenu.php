<style>

</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo (base_url()) ?>" class="brand-link">
    <img src="<?php echo (base_url()) ?>assets/adminlte/dist/img/logoesc.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
          <a href="<?php echo (site_url()) ?>" class="nav-link <?php echo ($menu == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>


        <?php
        $menudropdown = array("disciplescommunity", "dcmember", "konfirmasidc");



        if (in_array($menu, $menudropdown)) {
          $dropdownselected = true;
        } else {
          $dropdownselected = false;
        }
        ?>


        <li class="nav-item has-treeview <?php echo ($dropdownselected) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?php echo ($dropdownselected) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Disciples Community
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>


          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?php echo (site_url("disciplescommunity")) ?>" class="nav-link <?php echo ($menu == 'disciplescommunity') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>DC Info</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo (site_url("konfirmasidc")) ?>" class="nav-link <?php echo ($menu == 'konfirmasidc') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Konfirmasi Pengajuan</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?php echo (site_url("dcmember")) ?>" class="nav-link <?php echo ($menu == 'dcmember') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Member</p>
              </a>
            </li>

          </ul>
        </li>



        <li class="nav-item">
          <a href="<?php echo (site_url('login/keluar')) ?>" class="nav-link text-warning">
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