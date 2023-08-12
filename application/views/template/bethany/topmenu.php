<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="index.html"><span>ESC Indonesia</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="<?php echo site_url('assets/bethany/') ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <?php
              $rsMenu = $this->Home_model->get_menu(1);
              if ($rsMenu->num_rows()>0) {
                foreach ($rsMenu->result() as $rowmenu) {
                  

                  //variabel untuk menu active
                  $active = '';

                  // Link menu
                  switch (strtoupper($rowmenu->jenismenu)) {
                    case 'URL LINK':
                      $linkmenu = $rowmenu->linkmenu;
                      break;
                    case 'KATEGORI LINK':
                      $linkmenu = site_url('kategori/index/'.$this->encrypt->encode($rowmenu->idmenu).'/'.$rowmenu->slug_pageskategori);
                      break;
                    case 'PAGE LINK':
                      $linkmenu = site_url('pages/read/'.$this->encrypt->encode($rowmenu->idmenu).'/'.$rowmenu->slug_pages);
                      break;
                    default:
                      $linkmenu = "#";
                      break;
                  }

                  // link untuk home
                  if (empty($linkmenu) || $linkmenu=='/') {
                    $linkmenu = site_url();
                  }else if (substr($linkmenu, 0,1)=='/') {
                    $linkmenu = site_url($linkmenu.'/'.$this->encrypt->encode($rowsubmenu->idmenu));
                  }

                  if (empty($menu)) {
                    $menu = $rowmenu->idmenu;
                  }

                  $openinnewtab = '';
                  if ($rowmenu->openinnewtab=="1") {
                    $openinnewtab = ' target="_blank" ';
                  }

                  $rsSubMenu = $this->Home_model->get_submenu($rowmenu->idmenu);
                  //Jika ada sub menu
                  if ($rsSubMenu->num_rows()>0) {


                    if ($this->Home_model->isActiveSubMenu($rowmenu->idmenu, $menu)) {
                      $active = ' active ';
                    }


                    echo '
                      <li class="dropdown"><a href="#" class="'.$active.'"><span>'.$rowmenu->namamenu.'</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>';

                    foreach ($rsSubMenu->result() as $rowsubmenu) {

                      // Link sub menu
                      switch (strtoupper($rowsubmenu->jenismenu)) {
                        case 'URL LINK':
                          $linkmenu = $rowsubmenu->linkmenu;
                          break;
                        case 'KATEGORI LINK':
                          $linkmenu = site_url('kategori/index/'.$this->encrypt->encode($rowsubmenu->idmenu).'/'.$rowsubmenu->slug_pageskategori);
                          break;
                        case 'PAGE LINK':
                          $linkmenu = site_url('pages/read/'.$this->encrypt->encode($rowsubmenu->idmenu).'/'.$rowsubmenu->slug_pages);
                          break;
                        default:
                          $linkmenu = "#";
                          break;
                      }

                      // link untuk home
                      if (empty($linkmenu) || $linkmenu=='/') {
                        $linkmenu = site_url();
                      }else if (substr($linkmenu, 0,1)=='/') {
                        $linkmenu = site_url($linkmenu.'/'.$this->encrypt->encode($rowsubmenu->idmenu));
                      }

                      $openinnewtab = '';
                      if ($rowsubmenu->openinnewtab=="1") {
                        $openinnewtab = ' target="_blank" ';
                      }

                      echo '<li><a href="'.$linkmenu.'" '.$openinnewtab.'>'.$rowsubmenu->namamenu.'</a></li>';
                    }

                    echo '
                        </ul>
                      </li>
                    ';
                  }else{
                    if ($menu==$rowmenu->idmenu) {
                      $active = ' active ';
                    }

                    echo '<li><a class="nav-link '.$active.'" href="'.$linkmenu.'" '.$openinnewtab.'>'.$rowmenu->namamenu.'</a></li>';
                  }
                }
              }

            ?>

            <?php

            ?>

            </li>

            <li><a class="getstarted scrollto show-form-login" href="#about">Login</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->