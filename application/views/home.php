<?php $this->load->view('template/festavalive/header'); ?>




  <!-- scholar CSS Files -->
  <!-- <link href="<?php echo base_url('assets/scholar/') ?>assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url('assets/scholar/') ?>assets/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/scholar/') ?>assets/css/templatemo-scholar.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url('assets/scholar/') ?>assets/css/owl.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url('assets/scholar/') ?>assets/css/animate.css" rel="stylesheet"> -->

    <!-- Edu CSS Files -->
  <link href="<?php echo base_url('assets/edu/') ?>css/fontawesome-edu.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/edu/') ?>css/templatemo-edu-meeting.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url('assets/edu/') ?>css/owl-edu.css" rel="stylesheet"> -->
  <!-- <link href="<?php echo base_url('assets/edu/') ?>css/lightbox-edu.css" rel="stylesheet"> -->

 <!-- Environs CSS Fles -->

        <!-- Libraries Stylesheet -->
  <!-- <link href="<?php echo base_url('assets/Environs/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->
  <!-- <link href="<?php echo base_url('assets/Environs/') ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">    -->
        <!-- Customized Bootstrap Stylesheet -->
  <!-- <link href="<?php echo base_url('assets/Environs/') ?>css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- Template Stylesheet -->
  <link href="<?php echo base_url('assets/Environs/') ?>css/style.css" rel="stylesheet">
      


<!-- TheEvent CSS Files -->
  <!-- <link href="<?php echo base_url('assets/TheEvent/') ?>vendor/aos/aos.css" rel="stylesheet"> -->
  <!-- <link href="<?php echo base_url('assets/TheEvent/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> -->
  <!-- <link href="<?php echo base_url('assets/TheEvent/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->


  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/TheEvent/') ?>css/style.css" rel="stylesheet">

  



<body>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900);



        body {
            background: #ffffff;
            color: #4f585e;
            font-family: 'Source Sans Pro', sans-serif;
            text-rendering: optimizeLegibility;
        }
      

        a.btn {
            background: #0096a0;
            border-radius: 4px;
            box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.25);
            color: #ffffff;
            display: inline-block;
            padding: 6px 30px 8px;
            position: relative;
            text-decoration: none;
            transition: all 0.1s 0s ease-out;
        }

        .no-touch a.btn:hover {
            background: lighten(#0096a0, 2.5);
            box-shadow: 0px 8px 2px 0 rgba(0, 0, 0, 0.075);
            transform: translateY(-2px);
            transition: all 0.25s 0s ease-out;
        }

     
        

        .no-touch a.btn:active,
        a.btn:active {
            background: darken(#0096a0, 2.5);
            box-shadow: 0 1px 0px 0 rgba(255, 255, 255, 0.25);
            transform: translate3d(0, 1px, 0);
            transition: all 0.025s 0s ease-out;
        }

        div.cards {
            margin: 80px auto;
            max-width: 960px;
            text-align: center;
        }

        div.card {
            background: #ffffff;
            display: inline-block;
            margin: 8px;
            max-width: 300px;
            perspective: 1000;
            position: relative;
            text-align: left;
            transition: all 0.3s 0s ease-in;
            width: 300px;
            z-index: 1;

            img {
                max-width: 300px;
            }

            .card__image-holder {
                background: rgba(0, 0, 0, 0.1);
                height: 0;
                padding-bottom: 75%;
            }

            div.card-title {
                background: #ffffff;
                padding: 6px 15px 10px;
                position: relative;
                z-index: 0;

                a.toggle-info {
                    border-radius: 32px;
                    height: 32px;
                    padding: 0;
                    position: absolute;
                    right: 15px;
                    top: 10px;
                    width: 32px;

                    span {
                        background: #ffffff;
                        display: block;
                        height: 2px;
                        position: absolute;
                        top: 16px;
                        transition: all 0.15s 0s ease-out;
                        width: 12px;
                    }

                    span.left {
                        right: 14px;
                        transform: rotate(45deg);
                    }

                    span.right {
                        left: 14px;
                        transform: rotate(-45deg);
                    }
                }

                h2 {
                    font-size: 24px;
                    font-weight: 700;
                    letter-spacing: -0.05em;
                    margin: 0;
                    padding: 0;

                    small {
                        display: block;
                        font-size: 18px;
                        font-weight: 600;
                        letter-spacing: -0.025em;
                    }
                }
            }

            div.card-description {
                padding: 0 15px 10px;
                position: relative;
                font-size: 14px;
            }

            div.card-actions {
                box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.075);
                padding: 10px 15px 20px;
                text-align: center;
            }

            div.card-flap {
                background: darken(#ffffff, 15);
                position: absolute;
                width: 100%;
                transform-origin: top;
                transform: rotateX(-90deg);
            }

            div.flap1 {
                transition: all 0.3s 0.3s ease-out;
                z-index: -1;
            }

            div.flap2 {
                transition: all 0.3s 0s ease-out;
                z-index: -2;
            }

        }

        div.cards.showing {
            div.card {
                cursor: pointer;
                opacity: 0.6;
                transform: scale(0.88);
            }
        }

        .no-touch div.cards.showing {
            div.card:hover {
                opacity: 0.94;
                transform: scale(0.92);
            }
        }

        div.card.show {
            opacity: 1 !important;
            transform: scale(1) !important;

            div.card-title {
                a.toggle-info {
                    background: #ff6666 !important;

                    span {
                        top: 15px;
                    }

                    span.left {
                        right: 10px;
                    }

                    span.right {
                        left: 10px;
                    }
                }
            }

            div.card-flap {
                background: #ffffff;
                transform: rotateX(0deg);
            }

            div.flap1 {
                transition: all 0.3s 0s ease-out;
            }

            div.flap2 {
                transition: all 0.3s 0.2s ease-out;
            }
        }
    </style>
    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="hero-section" id="section_1">
            <div class="section-overlay"></div>

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">

                    <div class="col-12 mt-auto mb-5 text-center">
                        <small><?php echo $rowinfogereja->subjudulhomepage ?></small>

                        <h1 class="text-white mb-5"><?php echo $rowinfogereja->judulhomepage ?></h1>
                        <?php
                        if (!empty($rowinfogereja->urlbuttonhomepage)) {
                            echo '
                                    <a class="btn custom-btn smoothscroll" href="' . $rowinfogereja->urlbuttonhomepage . '"></a>
                                ';
                        } else {
                        }
                        ?>
                    </div>

                    <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                        <div class="date-wrap">
                            <!-- <h5 class="text-white">
                                <i class="custom-icon bi-clock me-2"></i>
                                10 - 12<sup>th</sup>, Dec 2023
                            </h5> -->
                        </div>

                        <div class="location-wrap mx-auto py-3 py-lg-0">
                            <!-- <h5 class="text-white">
                                <i class="custom-icon bi-geo-alt me-2"></i>
                                National Center, United States
                            </h5> -->
                        </div>

                        <div class="social-share">
                            <!-- <ul class="social-icon d-flex align-items-center justify-content-center">
                                <span class="text-white me-3">Share:</span>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-facebook"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-twitter"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-instagram"></span>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-wrap">
                <video autoplay="" loop="" muted="" class="custom-video" poster="">
                    <source src="<?php echo base_url('assets/FestavaLive/') ?>video/pexels-2022395.mp4" type="video/mp4">

                    Your browser does not support the video tag.
                </video>
            </div>
        </section>


        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h5 class="text-white">Senior Pastor</h5>
                            <h2 class="text-white mb-4">Ps. Wilan</h2>

                            <div class="text-white">Pastor ... dilahirkan di Surabaya pada tanggal .... Dari kota kelahirannya, ia menempuh sekolah di ...., dan akhirnya bertobat saat SMA di Vancouver, Canada. Dua tahun setelah lulus sarjana sekolah Alkitab, saat kerusuhan terjadi di Indonesia pada bulan Mei 1998, ia memutuskan untuk pulang ke tanah airnya demi memberitakan Injil.</div>


                            <div class="text-white">Saat ini, ia menjabat sebagai gembala senior organisasi dan jaringan gereja ini. Visinya adalah untuk mendirikan 1.000 gereja lokal yang kuat dengan 1 juta murid Kristus. Kerinduan hatinya yang menyala adalah untuk melihat bangsa-bangsa mengalami kasih Yesus Kristus.</div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="<?php echo base_url('assets/FestavaLive/') ?>images/pexels-alexander-suhorucov-6457579.jpg" class="about-image img-fluid">

                            <div class="about-text-info d-flex">
                                <div class="d-flex">
                                    <i class="about-text-icon bi-person"></i>
                                </div>


                                <div class="ms-4">
                                    <h3>a happy moment</h3>

                                    <p class="mb-0">your amazing festival experience with us</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>




        <!-- <section class="ibadah-section">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="mt-4">Our Service</h1>
                </div>

                <div class="col-12">
                    <div class="cards">

                        <?php
                        $rsOurservice = $this->db->query("
                                select * from ourservice where statusaktif='Aktif'
                            ");
                        if ($rsOurservice->num_rows() > 0) {
                            foreach ($rsOurservice->result() as $rowOurService) {

                                if (empty($rowOurService->gambarsampul)) {
                                    $gambarsampul = base_url('images/nofoto.png');
                                } else {
                                    $gambarsampul = base_url('admin/uploads/ourservice/' . $rowOurService->gambarsampul);
                                }

                                if (empty($rowOurService->rangeumur)) {
                                    $rangeumur = '&nbsp;';
                                } else {
                                    $rangeumur = $rowOurService->rangeumur;
                                }

                                echo '
                                    <div class="card">
                                        <div class="card__image-holder">
                                            <img class="card__image" src="' . $gambarsampul . '" alt="" style="max-width: 100%;" />
                                        </div>
                                        <div class="card-title">
                                            <a href="#" class="toggle-info btn jangan-gerak">
                                                <span class="left"></span>
                                                <span class="right"></span>
                                            </a>
                                            <h2>
                                                ' . $rowOurService->namaourservice . '
                                                <small>' . $rangeumur . '</small>
                                            </h2>
                                        </div>
                                        <div class="card-flap flap1">
                                            <div class="card-description">
                                                ' . $rowOurService->deskripsisingkat . '
                                            </div>
                                            <div class="card-flap flap2">
                                                <div class="card-actions">
                                                    <a href="' . site_url('ourservice/watch/' . $rowOurService->slug) . '" class="btn">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    ';
                            }
                        }
                        ?> -->


              




                        <!-- <div class="card">
                            <div class="card__image-holder">
                                <img class="card__image" src="https://source.unsplash.com/300x225/?underwater" alt="underwater" />
                            </div>
                            <div class="card-title">
                                <a href="#" class="toggle-info btn">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                </a>
                                <h2>
                                    Card title
                                    <small>Image from unsplash.com</small>
                                </h2>
                            </div>
                            <div class="card-flap flap1">
                                <div class="card-description">
                                    This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available etc.
                                </div>
                                <div class="card-flap flap2">
                                    <div class="card-actions">
                                        <a href="#" class="btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                    </div>






                </div>



            </div>
        </section>


        <!-- scholar template  -->
        <div class="section about-us">
                    <div class="container ">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                        <div class="accordion mb-4" id="accordionExample">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Where shall we begin?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body mb-4">
                                Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How do we work together?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Why SCHOLAR is the best?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                There are more than one hundred responsive HTML templates to choose from <strong>Template</strong>Mo website. You can browse by different tags or categories.
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Do we get the best support?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                You can also search on Google with specific keywords such as <code>templatemo business templates, templatemo gallery templates, admin dashboard templatemo, 3-column templatemo, etc.</code>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-5 align-self-center">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>What make us the best academy online?</h2>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravid risus commodo.</div>
                            <div class="main-button">
                            <a href="#">Discover More</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>


<!-- edu teemplate -->
<section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Upcoming Meetings</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="categories">
            <h4>Meeting Catgories</h4>
            <ul>
              <li><a href="#">Sed tempus enim leo</a></li>
              <li><a href="#">Aenean molestie quis</a></li>
              <li><a href="#">Cras et metus vestibulum</a></li>
              <li><a href="#">Nam et condimentum</a></li>
              <li><a href="#">Phasellus nec sapien</a></li>
            </ul>
            <div class="main-button-red">
              <a href="meetings.html">All Upcoming Meetings</a>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$22.00</span>
                  </div>
                  <a href="meeting-details.html"> <img src="assets/edu/images/prayer.jpg" alt="New Lecturer Meeting"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6>Nov <span>10</span></h6>
                  </div>
                  <a href="meeting-details.html"><h4>New Lecturers Meeting</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$36.00</span>
                  </div>
                  <a href="meeting-details.html"><img src="assets/edu/images/gbr.jpg" alt="Online Teaching"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6>Nov <span>24</span></h6>
                  </div>
                  <a href="meeting-details.html"><h4>Online Teaching Techniques</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$14.00</span>
                  </div>
                  <a href="meeting-details.html"><img src="assets/edu/images/funes.jpg" alt="Higher Education"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6>Nov <span>26</span></h6>
                  </div>
                  <a href="meeting-details.html"><h4>Higher Education Conference</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$48.00</span>
                  </div>
                  <a href="meeting-details.html"><img src="assets/edu/images/church.jpg" alt="Student Training"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6>Nov <span>30</span></h6>
                  </div>
                  <a href="meeting-details.html"><h4>Student Training Meetup</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- Environs Template  -->
  <!-- About Start -->
  <div class="container-fluid about  py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-xl-5">
                        <div class="h-100">
                            <img src="assets/Environs/img/about-1.jpg" class="img-fluid w-100 h-100" alt="Image">
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <h5 class="text-uppercase text-primary">NextStep</h5>
                        <h1 class="mb-4">Our main goal is to protect environment</h1>
                        <p class="fs-5 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        </p>
                        <div class="tab-class bg-secondary1 p-4">
                            <ul class="nav d-flex mb-2">
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 text-center bg-white active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 150px;">Plan</span>
                                    </a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 mx-3 text-center bg-white" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 150px;">Grow</span>
                                    </a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 text-center bg-white" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 150px;">Serve</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content bg-transparent ">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <div class="text-start my-auto">
                                                    <h5 class="text-uppercase mb-3">Maz.92:13</h5>
                                                    <div class="mb-4">
                                                            “Orang benar akan bertunas seperti pohon korma, akan tumbuh subur seperti pohon aras di Libanon; (14) mereka yang DITANAM di bait TUHAN akan bertunas di pelataran Allah kita. (15) Pada masa tua pun mereka masih berbuah, menjadi gemuk dan segar…”
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-start">
                                                        <a class="btn-hover-bg btn btn-warna text-white py-2 px-4" href="#">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane fade show p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <div class="text-start my-auto">
                                                    <h5 class="text-uppercase mb-3">2 Petrus 3:18</h5>
                                                    <div class="mb-4">"… bertumbuhlah dalam kasih karunia dan dalam pengenalan akan Tuhan dan Juruselamat kita, Yesus Kristus"
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-start">
                                                        <a class="btn-hover-bg btn btn-warna text-white py-2 px-4" href="#">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane fade show p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <div class="text-start my-auto">
                                                    <h5 class="text-uppercase mb-3">Lorem Ipsum 3</h5>
                                                    <div class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-start">
                                                        <a class="btn-hover-bg btn btn-warna text-white py-2 px-4" href="#">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Services Start -->
        <div class="container-fluid service py-5 bg-light">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                    <h5 class="text-uppercase text-primary">What we do</h5>
                    <h1 class="mb-0">What we do to protect environment</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="service-item">
                            <img src="assets/Environs/img/service-1.jpg" class="img-fluid w-100" alt="Image">
                            <div class="service-link">
                                <a href="#" class="h4 mb-0">Raising money to help</a>
                            </div>
                        </div>
                        <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="service-item">
                            <img src="assets/Environs/img/service-2.jpg" class="img-fluid w-100" alt="Image">
                            <div class="service-link">
                                <a href="#" class="h4 mb-0"> close work with services</a>
                            </div>
                        </div>
                        <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="service-item">
                            <img src="assets/Environs/img/service-3.jpg" class="img-fluid w-100" alt="Image">
                            <div class="service-link">
                                <a href="#" class="h4 mb-0">Pro Guided tours only</a>
                            </div>
                        </div>
                        <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="service-item">
                            <img src="assets/Environs/img/service-4.jpg" class="img-fluid w-100" alt="Image">
                            <div class="service-link">
                                <a href="#" class="h4 mb-0">Protecting animal area</a>
                            </div>
                        </div>
                        <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-warna text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->
        <!-- Environs Template End -->

                            <!-- scholar template  -->
                        

                <!-- Scholar Template end -->
    

                    <!-- edu template -->
 <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h3>APPLY FOR BACHELOR DEGREE</h3>
                <p>You are allowed to use this edu meeting CSS template for your school or university or business. You can feel free to modify or edit this layout.</p>
                <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
              </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h3>APPLY FOR BACHELOR DEGREE</h3>
                <p>You are not allowed to redistribute the template ZIP file on any other template website. Please contact us for more information.</p>
                <div class="main-button-yellow">
                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="accordions-edu is-first-expanded">
            <article class="accordion-edu">
                <div class="accordion-head-edu">
                    <span>About Edu Meeting HTML Template</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body-edu">
                    <div class="content-edu">
                        <p>If you want to get the latest collection of HTML CSS templates for your websites, you may visit <a rel="nofollow" href="https://www.toocss.com/" target="_blank">Too CSS website</a>. If you need a working contact form script, please visit <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more info.</p>
                    </div>
                </div>
            </article>
            <article class="accordion-edu">
                <div class="accordion-head-edu">
                    <span>HTML CSS Bootstrap Layout</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body-edu">
                    <div class="content-edu">
                        <p>Etiam posuere metus orci, vel consectetur elit imperdiet eu. Cras ipsum magna, maximus at semper sit amet, eleifend eget neque. Nunc facilisis quam purus, sed vulputate augue interdum vitae. Aliquam a elit massa.<br><br>
                        Nulla malesuada elit lacus, ac ultricies massa varius sed. Etiam eu metus eget nibh consequat aliquet. Proin fringilla, quam at euismod porttitor, odio odio tempus ligula, ut feugiat ex erat nec mauris. Donec viverra velit eget lectus sollicitudin tincidunt.</p>
                    </div>
                </div>
            </article>
            <article class="accordion-edu">
                <div class="accordion-head-edu">
                    <span>Please tell your friends</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body-edu">
                    <div class="content-edu">
                        <p>Ut vehicula mauris est, sed sodales justo rhoncus eu. Morbi porttitor quam velit, at ullamcorper justo suscipit sit amet. Quisque at suscipit mi, non efficitur velit.<br><br>
                        Cras et tortor semper, placerat eros sit amet, porta est. Mauris porttitor sapien et quam volutpat luctus. Nullam sodales ipsum ac neque ultricies varius.</p>
                    </div>
                </div>
            </article>
            <article class="accordion-edu last-accordion-edu">
                <div class="accordion-head-edu">
                    <span>Share this to your colleagues</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body-edu">
                    <div class="content-edu">
                        <p>Maecenas suscipit enim libero, vel lobortis justo condimentum id. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br><br>
                        Sed eleifend metus sit amet magna tristique, posuere laoreet arcu semper. Nulla pellentesque ut tortor sit amet maximus. In eu libero ullamcorper, semper nisi quis, convallis nisi.</p>
                    </div>
                </div>
            </article>
        </div>
        </div>
      </div>
    </div>
  </section>

            <!-- TheEvent Template  -->
   <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
      <div class="container">
        <div class="section-header text-center">
          <h2>Event Schedule</h2>
          <p>Here is our event schedule</p>
        </div>

        <ul class="nav nav-tabs" role="tablist" >
          <li class="nav-item">
            <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab">Contoh 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab">Contoh 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-3" role="tab" data-bs-toggle="tab">Contoh 3</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-4" role="tab" data-bs-toggle="tab">Tambahan</a>
          </li>
        </ul>

        <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
          necessitatibus voluptatem quis labore perspiciatis quia.</h3>

        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <div class="row schedule-item">
              <div class="col-md-2"><time>09:30 AM</time></div>
              <div class="col-md-10">
                <h4>Registration</h4>
                <p>Fugit voluptas iusto maiores temporibus autem numquam magnam.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>10:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Keynote <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>11:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div>
                <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>02:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>03:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>04:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

            <div class="row schedule-item">
              <div class="col-md-2"><time>10:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>11:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div>
                <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>02:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>03:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>04:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>
          <!-- End Schdule Day 2 -->

          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

            <div class="row schedule-item">
              <div class="col-md-2"><time>10:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div>
                <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>11:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>02:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>03:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>04:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>
          <!-- End Schdule Day 3 -->

          <!-- Scedule Tambah -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-4">
                            
            <div class="row schedule-item">
                <div class="col-4">
                <a href="assets/TheEvent/img/venue-gallery/1.jpg">
                <img src="assets/TheEvent/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div></a>
                <div class="col-4">
                <img src="assets/TheEvent/img/speakers/1.jpg" alt="Hubert Hirthe">
                </div>
                <div class="col-4">
                <img src="assets/TheEvent/img/speakers/3.jpg" alt="Hubert Hirthe">
                </div>
                
             
                 
                 
              
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>11:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>02:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>03:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>04:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/TheEvent/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Schedule Section -->

    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid">

        <div class="section-header">
          <h2>Event Venue</h2>
          <p>Event venue location info and gallery</p>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 venue-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.816887503385!2d109.31588607555766!3d-0.04855789995095277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d591202901daf%3A0x7138b14058c20347!2sGBI%20El%20Shaddai!5e0!3m2!1sid!2sid!4v1715400581015!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8 position-relative">
                <h3>Downtown Conference Center, New York</h3>
                <p>Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus. Consequatur sequi et ea suscipit enim nesciunt quia velit.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container"  data-aos-delay="100">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/1.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/2.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/3.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/4.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/5.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/6.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/7.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/TheEvent/img/venue-gallery/8.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/TheEvent/img/venue-gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>
      </div>

    </section><!-- End Venue Section -->


      
                <!-- TheEvent Template End -->


                    <div class="section events" id="events">
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                            <div class="section-heading">
                                <h6>Schedule</h6>
                                <h2>Upcoming Events</h2>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                            <div class="item">
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="image">
                                    <img src="assets/scholar/assets/images/event-01.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <ul>
                                    <li>
                                        <span class="category">Web Design</span>
                                        <h4>UI Best Practices</h4>
                                    </li>
                                    <li>
                                        <span>Date:</span>
                                        <h6>16 Feb 2036</h6>
                                    </li>
                                    <li>
                                        <span>Duration:</span>
                                        <h6>22 Hours</h6>
                                    </li>
                                    <li>
                                        <span>Price:</span>
                                        <h6>$120</h6>
                                    </li>
                                    </ul>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                            <div class="item">
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="image">
                                    <img src="assets/scholar/assets/images/event-02.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <ul>
                                    <li>
                                        <span class="category">Front End</span>
                                        <h4>New Design Trend</h4>
                                    </li>
                                    <li>
                                        <span>Date:</span>
                                        <h6>24 Feb 2036</h6>
                                    </li>
                                    <li>
                                        <span>Duration:</span>
                                        <h6>30 Hours</h6>
                                    </li>
                                    <li>
                                        <span>Price:</span>
                                        <h6>$320</h6>
                                    </li>
                                    </ul>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                            <div class="item">
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="image">
                                    <img src="assets/scholar/assets/images/event-03.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <ul>
                                    <li>
                                        <span class="category">Full Stack</span>
                                        <h4>Web Programming</h4>
                                    </li>
                                    <li>
                                        <span>Date:</span>
                                        <h6>12 Mar 2036</h6>
                                    </li>
                                    <li>
                                        <span>Duration:</span>
                                        <h6>48 Hours</h6>
                                    </li>
                                    <li>
                                        <span>Price:</span>
                                        <h6>$440</h6>
                                    </li>
                                    </ul>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>


        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Feedback</h2>

                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab" data-bs-target="#nav-ContactForm" type="button" role="tab" aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Feedback Form</h5>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel" aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post" role="form">
                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="contact-name" id="contact-name" class="form-control" placeholder="Full name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="email" name="contact-email" id="contact-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                            </div>
                                        </div>

                                        <textarea name="contact-message" rows="3" class="form-control" id="contact-message" placeholder="Message"></textarea>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>

    <!-- <script src="<?php echo base_url('assets/scholar/') ?>vendor/jquery/js/jquery.min.js"></script> -->
    <!-- <script src="<?php echo base_url('assets/scholar/') ?>vendor/bootstrap/js/jquery.min.js"></script> -->
    <!-- <script src="<?php echo base_url('assets/scholar/') ?>assets/js/isotope.min.js"></script> -->
 
    <script src="<?php echo base_url('assets/scholar/') ?>assets/js/counter.js"></script>
    <script src="<?php echo base_url('assets/scholar/') ?>assets/js/custom.js"></script>

 <!-- TheEvent JS Files -->
    <script src="<?php echo base_url('assets/TheEvent/') ?>vendor/aos/aos.js"></script>
    <script src="<?php echo base_url('assets/TheEvent/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/TheEvent/') ?>vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url('assets/TheEvent/') ?>vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url('assets/TheEvent/') ?>vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets/TheEvent/') ?>js/main.jss"></script>
  
  <script src="assets/js/main.js"></script>
 
   
<!-- edu JS -->
    <!-- <script src="<?php echo base_url('assets/edu/')?>vendor/jquery/jquery.min-edu.js"></script> -->
    <!-- <script src="<?php echo base_url('assets/edu/')?>vendor/bootstrap/js/bootstrap.bundle.min-edu.js"></script> -->
    <!-- <script src="<?php echo base_url('assets/edu/') ?>js/isotope.min-edu.js"></script> -->
    <script src="<?php echo base_url('assets/edu/') ?>js/owl-carousel-edu.js"></script>
    <script src="<?php echo base_url('assets/edu/') ?>js/lightbox-edu.js"></script>
    <script src="<?php echo base_url('assets/edu/') ?>js/tabs-edu.js"></script>
    <!-- <script src="<?php echo base_url('assets/edu/') ?>js/video-edu.js"></script> -->
    <script src="<?php echo base_url('assets/edu/') ?>js/slick-slider-edu.js"></script>
    <script src="<?php echo base_url('assets/edu/') ?>js/custom_edu.js"></script>
    


    


    
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
    <!-- edu JS end --> --
    

    <script>
        $(document).ready(function() {
            var zindex = 10;

            $('.jangan-gerak').click(function(e) {
                e.preventDefault();
            })

            $("div.card").click(function(e) {
                // e.preventDefault();

                var isShowing = false;

                if ($(this).hasClass("show")) {
                    isShowing = true
                }

                if ($("div.cards").hasClass("showing")) {
                    // a card is already in view
                    $("div.card.show")
                        .removeClass("show");

                    if (isShowing) {
                        // this card was showing - reset the grid
                        $("div.cards")
                            .removeClass("showing");

                    } else {
                        // this card isn't showing - get in with it
                        $(this)
                            .addClass("show");

                    }

                    zindex++;

                } else {
                    // no cards in view
                    $("div.cards")
                        .addClass("showing");
                    $(this)
                        .addClass("show");

                    zindex++;
                }


            });
        });
    </script>
</body>

</html>