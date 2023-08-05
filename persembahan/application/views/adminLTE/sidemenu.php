<style>

</style>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo(base_url()) ?>" class="brand-link">
      <img src="<?php echo(base_url()) ?>assets/adminlte/dist/img/logoesc.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PERSEMBAHAN</span>
    </a>

    <!-- Sidebar -->
    <!-- <div class="sidebar text-sm">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $this->session->userdata('foto'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('namapanggilan'); ?></a>
        </div>  
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- <li class="nav-item">
            <a href="<?php echo(site_url()) ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li> -->


        


          


          <?php  
            $menudropdown = array("perpuluhan","soundsystem",);
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
                Persembahan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              
              <li class="nav-item">
                <a href="<?php echo(site_url("perpuluhan")) ?>" class="nav-link <?php echo ($menu=='perpuluhan') ? 'active' : '' ?>">
                  <i class="fas fa-users"></i>
                  <p>Perpuluhan</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="<?php echo(site_url("sound_system")) ?>" class="nav-link <?php echo ($menu=='soundsystem') ? 'active' : '' ?>">
                  <i class="fas fa-users"></i>
                  <p>Sound System</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo(site_url("pembangunan")) ?>" class="nav-link <?php echo ($menu=='pembangunan') ? 'active' : '' ?>">
                  <i class="fas fa-users"></i>
                  <p>Pembangunan</p>
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
