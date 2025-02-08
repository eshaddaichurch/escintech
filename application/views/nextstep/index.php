<?php

use PhpParser\Node\Stmt\Echo_;

 $this->load->view('template/festavalive/header'); ?>

<body>

    <main>

        <?php $this->load->view('template/festavalive/topmenu'); ?>

        <style>
            @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
            $main-green: #79dd09 !default;
            $main-green-rgb-015: rgba(121, 221, 9, 0.1) !default;
            $main-yellow: #bdbb49 !default;
            $main-yellow-rgb-015: rgba(189, 187, 73, 0.1) !default;
            $main-red: #bd150b !default;
            $main-red-rgb-015: rgba(189, 21, 11, 0.1) !default;
            $main-blue: #0076bd !default;
            $main-blue-rgb-015: rgba(0, 118, 189, 0.1) !default;

            /* This pen */


            .dark {
                background: #110f16;
            }


            .light {
                background: #f3f5f7;
            }

            a,
            a:hover {
                text-decoration: none;
                transition: color 0.3s ease-in-out;
            }

            #pageHeaderTitle {
                margin: 2rem 0;
                text-transform: uppercase;
                text-align: center;
                font-size: 2.5rem;
            }

            /* Cards */
            .postcard {
                flex-wrap: wrap;
                display: flex;

                box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
                border-radius: 10px;
                margin: 0 0 4rem 0;
                overflow: hidden;
                position: relative;
                color: #ffffff;

                &.dark {
                    background-color: #18151f;
                }

                &.light {
                    background-color: #e1e5ea;
                }

                .t-dark {
                    color: #18151f;
                }

                a {
                    color: inherit;
                }

                h1,
                .h1 {
                    margin-bottom: 0.5rem;
                    font-weight: 500;
                    line-height: 1.2;
                }

                .small {
                    font-size: 80%;
                }

                .postcard__title {
                    font-size: 1.75rem;
                    padding-left: 10px;
                }

                .postcard__img {
                    max-height: 180px;
                    width: 100%;
                    object-fit: cover;
                    position: relative;
                }

                .postcard__img_link {
                    display: contents;
                }

                .postcard__bar {
                    width: 50px;
                    height: 10px;
                    margin: 10px 0;
                    border-radius: 5px;
                    background-color: #424242;
                    transition: width 0.2s ease;
                }

                .postcard__text {
                    padding: 2.5rem;
                    position: relative;
                    display: flex;
                    flex-direction: column;
                }

                .postcard__preview-txt {
                    overflow: hidden;
                    text-overflow: ellipsis;
                    text-align: left;
                    height: 100%;
                }

                .postcard__tagbox {
                    display: flex;
                    flex-flow: row wrap;
                    font-size: 14px;
                    margin: 20px 0 0 0;
                    padding: 0;
                    justify-content: center;

                    .tag__item {

                        display: inline-block;
                        background: #FAF0E6;
                        border-radius: 3px;
                        padding: 2.5px 10px;
                        margin: 0 5px 5px 0;
                        cursor: default;
                        user-select: none;
                        transition: background-color 0.3s;

                        &:hover {
                            background: #FFD09B;
                        }
                    }
                }

                &:before {
                    content: "";
                    position: abslute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    background-image: linear-gradient(-70deg, #424242, transparent 50%);
                    opacity: 1;
                    border-radius: 10px;
                }

                &:hover .postcard__bar {
                    width: 100px;
                }
            }

            @media screen and (min-width: 769px) {
                .postcard {
                    flex-wrap: inherit;

                    .postcard__title {
                        font-size: 2rem;
                    }

                    .postcard__tagbox {
                        justify-content: start;
                    }

                    .postcard__img {
                        max-width: 300px;
                        max-height: 100%;
                        transition: transform 0.3s ease;
                    }

                    .postcard__text {
                        padding-left: 4rem;
                        width: 100%;

                    }

                    .media.postcard__text:before {
                        content: "";
                        position: absolute;
                        display: block;
                        background: #18151f;
                        top: -20%;
                        height: 130%;
                        width: 55px;
                    }

                    &:hover .postcard__img {
                        transform: scale(1.1);
                    }

                    &:nth-child(2n+1) {
                        flex-direction: row;
                    }

                    &:nth-child(2n+0) {
                        flex-direction: row-reverse;
                    }

                    &:nth-child(2n+1) .postcard__text::before {
                        left: -12px !important;
                        transform: rotate(4deg);
                    }

                    &:nth-child(2n+0) .postcard__text::before {
                        right: -12px !important;
                        transform: rotate(-4deg);
                    }
                }
            }

            @media screen and (min-width: 1024px) {
                .postcard__text {
                    padding: 2rem 3.5rem;
                }

                .postcard__text:before {
                    content: "";
                    position: absolute;
                    display: block;

                    top: -20%;
                    height: 130%;
                    width: 55px;
                }

                .postcard.dark {
                    .postcard__text:before {
                        background: #18151f;
                    }
                }

                .postcard.light {
                    .postcard__text:before {
                        background: #e1e5ea;
                    }
                }
            }
        </style>

        <!-- baru -->
        <style>
            @import url('https://fonts.googleapis.com/css?family=Oswald:300,400,500,700');

            @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');

            .gr-1 {
                background: linear-gradient(170deg, #01E4F8 0%, #1D3EDE 100%);
            }

            .gr-2 {
                background: linear-gradient(170deg, #B4EC51 0%, #429321 100%);
            }

            .gr-3 {
                background: linear-gradient(170deg, #C86DD7 0%, #3023AE 100%);
            }

            .gr-4 {
                background: linear-gradient(170deg, #f7b801 0%, #f35b04 100%);
            }

            .gr-5 {
                background: linear-gradient(170deg, #ffa69e 0%, #d90429 100%);
            }

            .gr-6 {
                background: linear-gradient(170deg, #a2d6f9 0%, #1e96fc 100%);
            }

            .gr-7 {
                background: linear-gradient(170deg, #d4e09b 0%, #a7c957 100%);
            }

            .gr-8 {
                background: linear-gradient(170deg, #c4fff9 0%, #07beb8 100%);
            }

            .gr-9 {
                background: linear-gradient(170deg, #fae0e4 0%, #ff477e 100%);
            }

            * {
                transition: .5s;
            }

            .h-100 {
                height: 100vh !important;
            }

            .align-middle {
                position: relative;
                top: 5%;
                /* transform:translateY(-50%); */
            }

            .column {
                margin-top: 3rem;
                padding-left: 3rem;

                &:hover {
                    padding-left: 0;

                    .card .txt {
                        margin-left: 1rem;

                        h1,
                        p {
                            color: rgba(255, 255, 255, 1);
                            opacity: 1;
                        }
                    }

                    a {
                        color: rgba(255, 255, 255, 1);

                        &:after {
                            width: 10%;
                        }
                    }
                }
            }

            .card {
                min-height: 170px;
                margin: 0;
                padding: 1.7rem 1.2rem;
                border: none;
                border-radius: 0;
                color: rgba(0, 0, 0, 1);
                letter-spacing: .05rem;
                font-family: 'Oswald', sans-serif;
                box-shadow: 0 0 21px rgba(0, 0, 0, .27);

                .txt {
                    margin-left: -3rem;
                    z-index: 1;

                    h1 {
                        font-size: 1.5rem;
                        font-weight: 300;
                        text-transform: uppercase;
                    }

                    p {
                        font-size: .7rem;
                        font-family: 'Open Sans', sans-serif;
                        letter-spacing: 0rem;
                        margin-top: 33px;
                        opacity: 0;
                        color: rgba(255, 255, 255, 1);
                    }
                }

                a {
                    z-index: 3;
                    font-size: .9rem;
                    color: rgba(0, 0, 0, 1);
                    margin-left: 1rem;
                    position: relative;
                    bottom: -.5rem;
                    text-transform: uppercase;

                    &:after {
                        content: "";
                        display: inline-block;
                        height: 0.5em;
                        width: 0;
                        margin-right: -100%;
                        margin-left: 10px;
                        border-top: 1px solid rgba(255, 255, 255, 1);
                        transition: .5s;
                    }
                }

                .ico-card {
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                }

                i {
                    position: relative;
                    right: -50%;
                    top: 60%;
                    font-size: 12rem;
                    line-height: 0;
                    opacity: .2;
                    color: rgba(255, 255, 255, 1);
                    z-index: 0;
                }

                .bi {

                    position: relative;
                    right: -50%;
                    top: 20%;
                    font-size: 12rem;
                    line-height: 0;
                    opacity: .2;
                    color: rgba(255, 255, 255, 1);
                    z-index: 0;

                }
            }
        </style>

        <section>
            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs d-flex align-items-center"
                style="background-image: url('<?php echo base_url('assets/gambar/back.jpg'); ?>'); height: 350px; background-size: cover; background-position: center;">
                <div class="container position-relative d-flex flex-column align-items-center " data-aos="fade">

                    <h2 class="text-white"><?php echo $title ?></h2>
                </div>
            </div><!-- End Breadcrumbs -->
        </section>

        <section class=" pb-5">

            <div class="pt-5 h1 text-center text-dark" id="pageHeaderTitle">Sudah Pernah Mengikuti Kelas Next Step?
            </div>
            <div class="row align-items-start mt-3 mt-lg-5">
                <div class="col-lg-6">
                    <div class="p-5">
                        <p>ESC Next Step adalah Wadah Bidang Pengajaran di El Shaddai Church (ESC) yang bertujuan
                            mempersiapkan jemaat untuk bertumbuh dalam iman, sehingga mereka dapat menjadi serupa dengan
                            Kristus, sebagaimana dinyatakan dalam Roma 8:29, &ldquo;Sebab semua orang yang dipilih-Nya
                            dari semula, mereka juga ditentukanNya dari semula untuk menjadi serupa dengan gambaran
                            Anak-Nya.</p>
                        <p dir="ltr">Dengan Visi ESC &quot;Menjadi Jemaat yang Serupa dengan Kristus Yesus&quot; dan
                            Misi ESC untuk menyelamatkan jiwa-jiwa, menjadi murid Kristus yang memuridkan, serta hidup
                            saling mengasihi (Yohanes 13:34-35), Next Step menawarkan serangkaian Tahap atau Langkah
                            yang terarah untuk menuntun jemaat ke dalam kedewasaan rohani sesuai Visi dan Misi ESC.</p>

                    </div>
                    <img src="<?php echo base_url('assets/gambar/gbr1.png'); ?>" alt="img"
                        class="img-fluid rounded-4 ms-5" style="width: 90% ">
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 ps-5 ">
                    <img src="<?php echo base_url('assets/gambar/gbr2.png'); ?>" alt="img" class="img-fluid rounded-4"
                        style="width:90%">
                    <img src="<?php echo base_url('assets/gambar/gbr3.jpg'); ?>" alt="img"
                        class="img-fluid rounded-4 mt-4" style="width:60%">
                    <div>

                    </div>
                </div>
            </div>

        </section>

        <!-- 

        <section class="">
            <div class="container py-2">
            


                

                <p dir="ltr"><strong>Tahap-tahap Next Step mencakup:</strong></p>

                <ol>
                    <li dir="ltr">
                        <p dir="ltr">Tahap New (Foundation Class 1 dan Membership Class): Mempelajari dasar keselamatan (Efesus 2:8-9) dan pengenalan gereja.</p>
                    </li>
                    <li dir="ltr">
                        <p dir="ltr">Tahap Plant (Foundation Class 2 dan Foundation Class 3): Jemaat didorong untuk membangun Hubungan dengan Tuhan lewat doa (Filipi 4:6-7) dan mengalami hidup yang dipulihkan dari beban dosa (Matius 11:28-30).</p>
                    </li>
                    <li dir="ltr">
                        <p dir="ltr">Tahap Grow (Grade 1 The Cross, Grade 2 The Power, Grade 3 The Eternity): Mempelajari Doktrin Keselamatan, Kuasa Roh Kudus (Kisah Para Rasul 1:8), dan Kedatangan Yesus kembali (1 Tesalonika 4:16-17).</p>
                    </li>
                    <li dir="ltr">
                        <p dir="ltr">Tahap Serve (Volunteers Class): Jemaat dilatih untuk melayani dengan nilai-nilai yang benar sesuai dengan Firman Tuhan (Markus 10:45).</p>
                    </li>
                </ol>

                <p dir="ltr">Dengan Motto &quot;Shine, Bless, Glory&quot; (Matius 5:16) dan Core Values: Love, Obedience, Relevance, Discipleship, and Jesus, ESC Next Step adalah pintu masuk bagi setiap jemaat untuk tertanam, bertumbuh, menjadi saksi, menjadi&nbsp; berkat bagi sesama jemaat dan dunia.</p>

                <p>Mari Bertumbuh Bersama.</p>
                <div class="row pt-5">
                    <div class="col-12 col-md-6">
                        <article class="postcard light blue">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark pl-3">
                                <h1 class="postcard__title blue "><a href="#">Foundation Class 1</a></h1>

                                <div class="postcard__bar"></div>
                               
                                <a href="<?= site_url('nextstep/kelas/foundation_class_1')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-6">
                        <article class="postcard light red">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/501/500" alt="Image Title" />

                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title red"><a href="<?= site_url('nextstep/kelas/membership_class')?>">Membership Class</a></h1>

                                <div class="postcard__bar"></div>
                                <a href="<?= site_url('nextstep/kelas/membership_class')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>
                                
                            </div>

                        </article>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <article class="postcard light green">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="<?php echo base_url('assets/gambar/gbr2.png');?>" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title green"><a href="#">Foundation Class 2</a></h1>

                                <div class="postcard__bar"></div>
                                <a href="<?= site_url('nextstep/kelas/foundation_class_2')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>
                                >
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6">
                        <article class="postcard light yellow">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title yellow"><a href="<?= site_url('nextstep/kelas/foundation_class_3')?>">Foundation Class 3</a></h1>

                                <div class="postcard__bar"></div>
                                <a href="<?= site_url('nextstep/kelas/foundation_class_3')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <article class="postcard light green">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/500/501" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title green"><a href=" <?php base_url('nextstep/kelas')?>">Grade 1</a></h1>

                                <div class="postcard__bar"></div>
                                <a href="<?= site_url('nextstep/kelas/grade_1')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>
                               
                            </div>
                        </article>s
                    </div>
                    <div class="col-md-6">
                        <article class="postcard light yellow">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title yellow"><a href="<?= site_url('nextstep/kelas/grade_2')?>">Grade 2</a></h1>

                                <div class="postcard__bar"></div>
                                <a href="<?= site_url('nextstep/kelas/grade_2')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>
                               
                            </div>
                        </article>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <article class="postcard light green">
                                <a class="postcard__img_link" href="#">
                                    <img class="postcard__img" src="<?php echo base_url('assets/gambar/gbr1.png');?>" alt="Image Title" />
                                </a>
                                <div class="postcard__text t-dark">
                                    <h1 class="postcard__title green"><a href="#">Grade 3</a></h1>

                                    <div class="postcard__bar"></div>
                                    <a href="<?= site_url('nextstep/kelas/grade_3')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="postcard light yellow">
                                <a class="postcard__img_link" href="#">
                                    <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
                                </a>
                                <div class="postcard__text t-dark">
                                    <h1 class="postcard__title yellow"><a href="#">Volunteer Class</a></h1>

                                    <div class="postcard__bar"></div>
                                    <a href="<?= site_url('nextstep/kelas/volunteer_class')?>">Daftar Sekarang <img src="<?php echo base_url('assets/icon/right-arrow.svg');?>" alt="" style="vertical-align: middle; height: 1.5em;">  </a>

                                </div>
                            </article>
                        </div>
                    </div>
                </div>


            </div>
            </div>
        </section> -->

        <div class="container pb-5  ">
            <div class="row align-middle">

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-1">
                        <div class="txt">
                            <h1>FOUNDATION CLASS 1 </br>BAPTISM & SALVATION</h1>
                            <p>Kelas Pengajaran tentang baptian dan keselamatan</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/foundation_class_1')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="bi bi-water"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-2">
                        <div class="txt">
                            <h1>Membership class </br>esc church</h1>
                            <p>kelas tentang bagaiamana kita mengenal profil ESC church</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/membership_class')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="fas fa-church"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-3">
                        <div class="txt">
                            <h1>foundation class 2 </br>prayer</h1>
                            <p>Kelas pengajaran tentang doa</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/foundation_class_2')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="fas fa-praying-hands"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-4">
                        <div class="txt">
                            <h1>FOUNDATION CLASS 3 </br>renewal life</h1>
                            <p>Kelas Pengajaran tentang baptian dan keselamatan</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/foundation_class_3')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="fas fa-pray"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-5">
                        <div class="txt">
                            <h1>grade 1 </br>the cross</h1>
                            <p>kelas tentang bagaiamana kita mengenal profil ESC church</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/grade_1')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="fas fa-bible"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-6">
                        <div class="txt">
                            <h1>grade 2 </br>the power</h1>
                            <p>Kelas pengajaran tentang doa</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/grade_2')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="bi bi-journal-bookmark bo"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-7">
                        <div class="txt">
                            <h1>grade 3 </br>the eternity</h1>
                            <p>Kelas Pengajaran tentang baptian dan keselamatan</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/grade_3')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="bi bi-journal-check"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-8">
                        <div class="txt">
                            <h1>volunteer class </br>volunteer</h1>
                            <p>kelas tentang bagaiamana kita mengenal profil ESC church</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/volunteer_class')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 column">
                    <div class="card gr-9">
                        <div class="txt">
                            <h1>married class </br>Pernikahan</h1>
                            <p>Kelas pra nikah</p>
                        </div>
                        <a href="<?= site_url('nextstep/kelas/marriage_class')?>">Daftar sekarang</a>
                        <div class="ico-card">
                            <i class="bi bi-house-heart-fill"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <?php $this->load->view('template/festavalive/footer'); ?>