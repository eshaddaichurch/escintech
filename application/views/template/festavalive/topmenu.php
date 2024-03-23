<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url() ?>">
            Elshaddai Church
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">

                <?php
                $rsMenu1 = $this->db->query("SELECT * FROM v_frontmenus WHERE levels=1 ORDER BY nomorurut");
                if ($rsMenu1->num_rows() > 0) {
                    foreach ($rsMenu1->result() as $row1) {

                        $urlmenu = '';
                        if ($row1->openinnewtab == '1') {
                            $openinnewtab = ' target="_blank" ';
                        } else {
                            $openinnewtab = '';
                        }

                        if ($menu == $row1->idmenu) {
                            $active = 'active';
                        } else {
                            $active = '';
                        }

                        switch ($row1->jenismenu) {
                            case 'Url Link':
                                if ($row1->linkmenu == '/') {
                                    if (empty($menu)) {
                                        $active = 'active';
                                    }
                                    $urlmenu = site_url('home'); // 
                                } else {

                                    if (substr($row1->linkmenu, 0, 1) == '/') {
                                        $urlmenu = site_url($row1->linkmenu . '/' . $this->encrypt->encode($row1->idmenu)); // http://localhost/escintech//ourlocation/index
                                    } else {
                                        $urlmenu = $row1->linkmenu;
                                    }
                                }
                                break;
                            case 'Kategori Link':
                                $urlmenu = site_url('kategori/index/' . $this->encrypt->encode($row1->idmenu) . '/' . $row1->slug_pageskategori);
                                break;
                            case 'Page Link':
                                $urlmenu = site_url('pages/read/' . $this->encrypt->encode($row1->idmenu) . '/' . $row1->slug_pages);
                                break;
                            default:
                                $urlmenu = "#";
                                break;
                        }


                        $rsMenu2 = $this->db->query("SELECT * FROM V_frontmenus WHERE parentidmenu='" . $row1->idmenu . "' ORDER BY nomorurut");
                        if ($rsMenu2->num_rows() > 0) {


                            $active = '';
                            foreach ($rsMenu2->result() as $rowCekActive) {
                                if ($menu == $rowCekActive->idmenu) {
                                    $active = 'active';
                                    break;
                                }
                            }

                            //ada turunan menu / dropdown
                            echo '
                                        <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle ' . $active . '" data-bs-toggle="dropdown">' . $row1->namamenu . '</a>
                                        <div class="dropdown-menu m-0">';

                            foreach ($rsMenu2->result() as $row2) {
                                if ($row2->openinnewtab == '1') {
                                    $openinnewtab = ' target="_blank" ';
                                } else {
                                    $openinnewtab = '';
                                }
                                $urlmenu = '';
                                switch ($row2->jenismenu) {
                                    case 'Url Link':
                                        if (substr($row2->linkmenu, 0, 1) == '/') {
                                            $urlmenu = site_url($row2->linkmenu . '/' . $this->encrypt->encode($row2->idmenu));
                                        } else {
                                            $urlmenu = $row2->linkmenu;
                                        }
                                        break;
                                    case 'Kategori Link':
                                        $urlmenu = site_url('kategori/index/' . $this->encrypt->encode($row2->idmenu) . '/' . $row2->slug_pageskategori);
                                        break;
                                    case 'Page Link':
                                        $urlmenu = site_url('pages/read/' . $this->encrypt->encode($row2->idmenu) . '/' . $row2->slug_pages);
                                        break;
                                    default:
                                        $urlmenu = "#";
                                        break;
                                }

                                echo '<a href="' . $urlmenu . '" class="dropdown-item"' . $openinnewtab . '>' . $row2->namamenu . '</a>';
                            }

                            echo '
                                                </div>
                                            </li>
                                        ';
                        } else {
                            //tidak punya turunan menu
                            echo '
                                            <li class="nav-item">
                                                <a class="nav-link ' . $active  . '" href="' . $urlmenu . '"' . $openinnewtab . '>' . $row1->namamenu . '</a>
                                            </li>
                                        ';
                        }
                    }
                }
                ?>

                <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">About</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Artists</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Schedule</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Contact</a>
                        </li> -->

                <?php
                if (empty($this->session->userdata('idjemaat'))) {
                    echo '<a href="' . site_url('login') . '" class="btn custom-btn d-lg-block d-none show-form-login">Login</a>';
                } else {

                    if ($menu == 'Akun') {
                        $active = 'active';
                    } else {
                        $active = '';
                    }

                    echo '
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle ' . $active . '" data-bs-toggle="dropdown">' . $this->session->userdata('namalengkap') . '</a>
                                <div class="dropdown-menu m-0">
                                    <a href="team.html" class="dropdown-item">Profil Saya</a>
                                    <a href="' . site_url('Akun/kelas') . '" class="dropdown-item">Kelas Saya</a>
                                    <a href="' . site_url('login/keluar') . '" class="dropdown-item">Logout</a>
                                </div>
                            </li>
                            ';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>