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
            <a href="<?php echo(site_url()) ?>" class="nav-link <?php echo ($this->session->userdata('IDMENUSELECTED')=='HOME') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard Visitor
              </p>
            </a>
          </li>


          <?php  
            $IDMENUSELECTED = $this->session->userdata('IDMENUSELECTED');

            $rsSidemenu = $this->db->query("
                                            select * from v_sidemenus where idotorisasi='".$this->session->userdata('idotorisasi')."' order by nomorurut
                                          ");
            $generateMenu = '';
            $parentidmenu_old = '';
            $nlevels_old = 0;
            $jlhDropDown = 0;
            $noUrutSideMenu=1;
            if ($rsSidemenu->num_rows()>0) {
              foreach ($rsSidemenu->result() as $rowSideMenu) {
                $idmenu = $rowSideMenu->idmenu;
                $fontawesomeicon = $rowSideMenu->fontawesomeicon;

                if (empty($fontawesomeicon)) {
                  if ($rowSideMenu->isdropdown=='1') {
                    $fontawesomeicon = 'fas fa-database';
                  }else{
                    $fontawesomeicon = 'far fa-circle';
                  }
                  
                }
                if ($parentidmenu_old!=$rowSideMenu->parentidmenu && $nlevels_old>$rowSideMenu->nlevels) {
                  $generateMenu .= '
                      </ul>
                    </li>
                  ';
                  $jlhDropDown = $jlhDropDown - 1;
                }

                if ($rowSideMenu->nlevels==0) {
                  
                  for ($i=0; $i < $jlhDropDown ; $i++) { 
                    $generateMenu .= '
                        </ul>
                      </li>
                    ';
                  }
                  $jlhDropDown = 0;
                }

                if ($rowSideMenu->isdropdown=='1') {
                  $jlhDropDown++;
                  $parentidmenu = $rowSideMenu->idmenu;
                  $menuonselected = $rowSideMenu->menuonselected;
                  if (str_contains($rowSideMenu->menuonselected, $IDMENUSELECTED)) {
                    $dropdownopen = 'menu-open';
                    $dropdownactive = 'active';
                  }else{
                    $dropdownopen = '';
                    $dropdownactive = '';
                  }

                  $generateMenu .= '
                    <li class="nav-item has-treeview '.$dropdownopen.'">
                      <a href="#" class="nav-link '.$dropdownactive.'">
                        <i class="nav-icon '.$fontawesomeicon.'"></i>
                        <p>
                          '.$rowSideMenu->namamenu.'
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>


                      <ul class="nav nav-treeview">
                  ';

                }else{
                  if ($IDMENUSELECTED==$rowSideMenu->idmenu) {
                    $active = ' active ';
                  }else{
                    $active = '';
                  }

                  $generateMenu .= '
                    <li class="nav-item">
                      <a href="'.site_url($rowSideMenu->linkmenu).'" class="nav-link '.$active.'">
                        <i class="'.$fontawesomeicon.' nav-icon"></i>
                        <p>'.$rowSideMenu->namamenu.'</p>
                      </a>
                    </li>
                  ';
                }

                $parentidmenu_old = $rowSideMenu->parentidmenu;
                $noUrutSideMenu++;
                $nlevels_old = $rowSideMenu->nlevels;

              } // foreach

            }

            for ($i=0; $i < $jlhDropDown ; $i++) { 
              $generateMenu .= '
                  </ul>
                </li>
              ';
            }

            echo $generateMenu;

          ?>



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
