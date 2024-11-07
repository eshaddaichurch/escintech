<?php $this->load->view('template/festavalive/header'); ?>

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
                        background: #FA812F;
                        border-radius: 3px;
                        padding: 2.5px 10px;
                        margin: 0 5px 5px 0;
                        cursor: default;
                        user-select: none;
                        transition: background-color 0.3s;

                        &:hover {
                            background: #FEF3E2;
                        }
                    }
                }

                &:before {
                    content: "";
                    position: absolute;
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

            /* COLORS */
            .postcard .postcard__tagbox .green.play:hover {
                background: $main-green;
                color: black;
            }

            .green .postcard__title:hover {
                color: $main-green;
            }

            .green .postcard__bar {
                background-color: $main-green;
            }

            .green::before {
                background-image: linear-gradient(-30deg,
                        $main-green-rgb-015,
                        transparent 50%);
            }

            .green:nth-child(2n)::before {
                background-image: linear-gradient(30deg, $main-green-rgb-015, transparent 50%);
            }

            .postcard .postcard__tagbox .blue.play:hover {
                background: $main-blue;
            }

            .blue .postcard__title:hover {
                color: $main-blue;
            }

            .blue .postcard__bar {
                background-color: $main-blue;
            }

            .blue::before {
                background-image: linear-gradient(-30deg, $main-blue-rgb-015, transparent 50%);
            }

            .blue:nth-child(2n)::before {
                background-image: linear-gradient(30deg, $main-blue-rgb-015, transparent 50%);
            }

            .postcard .postcard__tagbox .red.play:hover {
                background: $main-red;
            }

            .red .postcard__title:hover {
                color: $main-red;
            }

            .red .postcard__bar {
                background-color: $main-red;
            }

            .red::before {
                background-image: linear-gradient(-30deg, $main-red-rgb-015, transparent 50%);
            }

            .red:nth-child(2n)::before {
                background-image: linear-gradient(30deg, $main-red-rgb-015, transparent 50%);
            }

            .postcard .postcard__tagbox .yellow.play:hover {
                background: $main-yellow;
                color: black;
            }

            .yellow .postcard__title:hover {
                color: $main-yellow;
            }

            .yellow .postcard__bar {
                background-color: $main-yellow;
            }

            .yellow::before {
                background-image: linear-gradient(-30deg,
                        $main-yellow-rgb-015,
                        transparent 50%);
            }

            .yellow:nth-child(2n)::before {
                background-image: linear-gradient(30deg,
                        $main-yellow-rgb-015,
                        transparent 50%);
            }

            @media screen and (min-width: 769px) {
                .green::before {
                    background-image: linear-gradient(-80deg,
                            $main-green-rgb-015,
                            transparent 50%);
                }

                .green:nth-child(2n)::before {
                    background-image: linear-gradient(80deg,
                            $main-green-rgb-015,
                            transparent 50%);
                }

                .blue::before {
                    background-image: linear-gradient(-80deg,
                            $main-blue-rgb-015,
                            transparent 50%);
                }

                .blue:nth-child(2n)::before {
                    background-image: linear-gradient(80deg, $main-blue-rgb-015, transparent 50%);
                }

                .red::before {
                    background-image: linear-gradient(-80deg, $main-red-rgb-015, transparent 50%);
                }

                .red:nth-child(2n)::before {
                    background-image: linear-gradient(80deg, $main-red-rgb-015, transparent 50%);
                }

                .yellow::before {
                    background-image: linear-gradient(-80deg,
                            $main-yellow-rgb-015,
                            transparent 50%);
                }

                .yellow:nth-child(2n)::before {
                    background-image: linear-gradient(80deg,
                            $main-yellow-rgb-015,
                            transparent 50%);
                }
            }






            /*------------------------------------*\
    Table of contents
\*------------------------------------*/

            /*
  - date-time-picker
  - Chocolat
 */

            /* date-time-picker */
            div.datetime-container,
            div.datetime-container * {
                box-sizing: border-box;
                font-family: arial, sans-serif
            }

            .fix-float:after {
                clear: both;
                content: "";
                display: table
            }

            div.datetime-container {
                background-color: #f4f4f4;
                border-radius: 5px 5px 0 0;
                margin: 5px 0;
                position: relative;
                text-align: center;
                user-select: none
            }

            div.datetime-container button.date,
            div.datetime-container button.time {
                appearance: none;
                -webkit-appearance: none;
                background-color: #f4f4f4;
                border: 0;
                border-radius: 5px 5px 0 0;
                cursor: pointer;
                outline: 0;
                padding: 0;
                text-transform: uppercase;
                width: 100%
            }

            div.datetime-container button.w-50 {
                float: left;
                width: 50%
            }

            div.datetime-container button.active {
                background-color: #fec601;
                color: #000
            }

            div.datetime-container button>span {
                display: inline-block;
                margin: 0 -2px
            }

            div.datetime-container button span.week-day {
                font-size: 14px;
                text-align: right
            }

            div.datetime-container button span.hours,
            div.datetime-container button span.month-day {
                font-size: 36px;
                text-align: center;
                width: 45px
            }

            div.datetime-container button span.month-year {
                font-size: 16px;
                text-align: left
            }

            div.datetime-container span.month-year span {
                font-size: 14px;
                font-weight: 700;
                position: relative;
                top: 2px
            }

            div.datetime-container button span.minutes {
                font-size: 18px
            }

            div.picker {
                background-color: #fff;
                border-radius: 0 0 5px 5px;
                box-shadow: 0 1px 10px #555;
                display: none;
                padding: 0 5px 10px;
                position: absolute;
                width: 100%;
                z-index: 2
            }

            div.picker table {
                border-collapse: collapse;
                color: #000;
                margin: 0 auto;
                width: 100%
            }

            div.picker table a {
                color: #000;
                display: inline-block;
                height: 20px;
                line-height: 20px;
                text-decoration: none;
                width: 20px
            }

            div.picker table th {
                font-size: 20px;
                font-weight: 400
            }

            div.picker table th span.month {
                font-weight: 700
            }

            div.picker table td,
            div.picker table th {
                border-bottom: 1px solid #ddd;
                padding: 10px 2px;
                text-align: center;
                vertical-align: middle;
                width: 14.285%
            }

            div.picker table td.day-label {
                font-size: 14px;
                text-transform: uppercase
            }

            div.picker table td.selectable {
                cursor: pointer
            }

            div.picker table td.selectable:hover {
                font-weight: 700
            }

            div.picker table a.disabled,
            div.picker table td.disabled {
                color: #ccc
            }

            div.picker table td.end-day,
            div.picker table td.start-day,
            div.picker table td.time-selected {
                background-repeat: no-repeat;
                font-weight: 700
            }

            div.picker table td.start-day {
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14'%3E%3Cpath fill='%23FFF' d='m0 14 6-7-6-7'/%3E%3C/svg%3E");
                background-position: 0
            }

            div.picker table td.end-day {
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14'%3E%3Cpath fill='%23FFF' d='M14 0 8 7l6 7'/%3E%3C/svg%3E");
                background-position: 100%
            }

            div.picker table td.start-day.end-day {
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14'%3E%3Cpath fill='%23FFF' d='m0 14 6-7-6-7'/%3E%3C/svg%3E"), url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14'%3E%3Cpath fill='%23FFF' d='M14 0 8 7l6 7'/%3E%3C/svg%3E");
                background-position: 0, 100%
            }

            div.picker table td.active,
            div.picker table td.time-selected {
                background-color: #fec601;
                color: #000
            }

            div.picker table td.inactive {
                background-color: #0b6e38;
                color: #fff
            }

            div.picker table td.range {
                background-color: #eee
            }

            div.picker table td select {
                appearance: none;
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='15' height='15' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M13.02 7.409v-3.98L7.752 7.854 2.485 3.43v3.978l5.267 4.426z'/%3E%3C/svg%3E");
                background-position: right .7em top 50%;
                background-repeat: no-repeat;
                background-size: .65em auto;
                border: 0;
                border-radius: 5px 5px 0 0;
                font-size: 18px;
                height: 40px;
                outline: none;
                padding: 0 5px;
                width: 60px
            }

            div.picker table td select::-ms-expand {
                display: none
            }

            div.picker button.confirm {
                appearance: none;
                -webkit-appearance: none;
                background-color: #f4f4f4;
                border: 0;
                border-radius: 5px 5px 0 0;
                cursor: pointer;
                height: 40px;
                outline: 0;
                padding: 10px;
                text-transform: uppercase
            }

            /* Chocolat Lightbox */

            .chocolat-zoomable.chocolat-zoomed {
                cursor: zoom-out;
            }

            .chocolat-open {
                overflow: hidden;
            }

            .chocolat-overlay {
                transition: opacity 0.4s ease, visibility 0s 0.4s ease;
                height: 100%;
                width: 100%;
                position: fixed;
                left: 0;
                top: 0;
                z-index: 10;
                background-color: #000;
                visibility: hidden;
                opacity: 0;
            }

            .chocolat-overlay.chocolat-visible {
                transition: opacity 0.4s, visibility 0s;
                visibility: visible;
                opacity: 0.8;
            }

            .chocolat-wrapper {
                transition: opacity 0.4s ease, visibility 0s 0.4s ease;
                width: 100%;
                height: 100%;
                position: fixed;
                opacity: 0;
                left: 0;
                top: 0;
                z-index: 16;
                color: #fff;
                visibility: hidden;
            }

            .chocolat-wrapper.chocolat-visible {
                transition: opacity 0.4s, visibility 0s;
                opacity: 1;
                visibility: visible;
            }

            .chocolat-zoomable .chocolat-img {
                cursor: zoom-in;
            }

            .chocolat-loader {
                transition: opacity 0.3s;
                height: 32px;
                width: 32px;
                position: absolute;
                left: 50%;
                top: 50%;
                margin-left: -16px;
                margin-top: -16px;
                z-index: 11;
                background: url(../images/chocolat/loader.gif);
                opacity: 0;
            }

            .chocolat-loader.chocolat-visible {
                opacity: 1;
            }

            .chocolat-image-wrapper {
                position: fixed;
                width: 0px;
                height: 0px;
                left: 50%;
                top: 50%;
                z-index: 14;
                text-align: left;
                transform: translate(-50%, -50%);
            }

            .chocolat-image-wrapper .chocolat-img {
                position: absolute;
                width: 100%;
                height: 100%;
            }

            .chocolat-wrapper .chocolat-left {
                width: 50px;
                height: 100px;
                cursor: pointer;
                background: url(../images/chocolat/left.png) 50% 50% no-repeat;
                z-index: 17;
                visibility: hidden;
            }

            .chocolat-layout {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }

            .chocolat-image-canvas {
                transition: opacity .2s;
                opacity: 0;
                flex-grow: 1;
                align-self: stretch;
            }

            .chocolat-image-canvas.chocolat-visible {
                opacity: 1;
            }

            .chocolat-center {
                flex-grow: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                user-select: none;
            }

            .chocolat-wrapper .chocolat-right {
                width: 50px;
                height: 100px;
                cursor: pointer;
                background: url(../images/chocolat/right.png) 50% 50% no-repeat;
                z-index: 17;
                visibility: hidden;
            }

            .chocolat-wrapper .chocolat-right.active {
                visibility: visible;
            }

            .chocolat-wrapper .chocolat-left.active {
                visibility: visible;
            }

            .chocolat-wrapper .chocolat-top {
                height: 50px;
                overflow: hidden;
                z-index: 17;
                flex-shrink: 0;
            }

            .chocolat-wrapper .chocolat-close {
                width: 50px;
                height: 50px;
                cursor: pointer;
                position: absolute;
                top: 0;
                right: 0;
                background: url(../images/chocolat/close.png) 50% 50% no-repeat;
            }

            .chocolat-wrapper .chocolat-bottom {
                height: 40px;
                font-size: 12px;
                z-index: 17;
                padding-left: 15px;
                padding-right: 15px;
                background: rgba(0, 0, 0, 0.2);
                flex-shrink: 0;
                display: flex;
                align-items: center;

            }

            .chocolat-wrapper .chocolat-set-title {
                display: inline-block;
                padding-right: 15px;
                line-height: 1;
                border-right: 1px solid rgba(255, 255, 255, 0.3);
            }

            .chocolat-wrapper .chocolat-pagination {
                float: right;
                display: inline-block;
                padding-left: 15px;
                padding-right: 15px;
                margin-right: 15px;
                /*border-right: 1px solid rgba(255, 255, 255, 0.2);*/
            }

            .chocolat-wrapper .chocolat-fullscreen {
                width: 16px;
                height: 40px;
                background: url(../images/chocolat/fullscreen.png) 50% 50% no-repeat;
                display: block;
                cursor: pointer;
                float: right;
            }

            .chocolat-wrapper .chocolat-description {
                display: inline-block;
                flex-grow: 1;
                text-align: left;
            }

            /* no container mode*/
            body.chocolat-open>.chocolat-overlay {
                z-index: 15;
            }

            body.chocolat-open>.chocolat-loader {
                z-index: 15;
            }

            body.chocolat-open>.chocolat-image-wrapper {
                z-index: 17;
            }

            /* container mode*/
            .chocolat-in-container .chocolat-wrapper,
            .chocolat-in-container .chocolat-image-wrapper,
            .chocolat-in-container .chocolat-overlay {
                position: absolute;
            }

            .chocolat-in-container {
                position: relative;
            }

            .chocolat-zoomable.chocolat-zooming-in .chocolat-image-wrapper,
            .chocolat-zoomable.chocolat-zooming-out .chocolat-image-wrapper {
                transition: width .2s ease, height .2s ease;
            }

            .chocolat-zoomable.chocolat-zooming-in .chocolat-img,
            .chocolat-zoomable.chocolat-zooming-out .chocolat-img {
                transition: margin .2s ease;
            }
        </style>

        <section>
            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo base_url('assets/gambar/back.jpg'); ?>'); height: 400px; background-size: cover; background-position: center;">
                <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                    <h2><?php echo $title ?></h2>
                    <button>Daftar</button>


                </div>
            </div><!-- End Breadcrumbs -->
        </section>



        <section  class= "light">
            <div class="container-fluid padding-side" data-aos="fade-up">
            <div class="h1 text-center text-dark" id="pageHeaderTitle">Sudah Pernah Mengikuti Kelas Next Step?</div>
                <div class="row align-items-start mt-3 mt-lg-5">
                    <div class="col-lg-6">
                        <div class="p-5">
                            <p>ESC Next Step adalah Wadah Bidang Pengajaran di El Shaddai Church (ESC) yang bertujuan mempersiapkan jemaat untuk bertumbuh dalam iman, sehingga mereka dapat menjadi serupa dengan Kristus, sebagaimana dinyatakan dalam Roma 8:29, &ldquo;Sebab semua orang yang dipilih-Nya dari semula, mereka juga ditentukanNya dari semula untuk menjadi serupa dengan gambaran Anak-Nya.</p>
                            <a href="index.html" class="btn btn-arrow btn-primary mt-3">
                                <span>Read About Us <svg width="18" height="18">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></span>
                            </a>
                        </div>
                        <img src="<?php echo base_url('assets/gambar/alkitab1.jpg'); ?>" alt="img" class="img-fluid rounded-4 ms-5" style="width: 95%; hight:200px">
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <img src="<?php echo base_url('assets/gambar/alkitab2.jpg'); ?>" alt="img" class="img-fluid rounded-4" style="height:350">
                        <img src="<?php echo base_url('assets/gambar/alkitab3.jpg'); ?>" alt="img" class="img-fluid rounded-4 mt-4" style="height:250px">

                    </div>
                </div>
            </div>
        </section>




        <section class="light">
            <div class="container py-2">
                <div class="h1 text-center text-dark" id="pageHeaderTitle">Sudah Pernah Mengikuti Kelas Next Step?</div>


                <p dir="ltr">Dengan Visi ESC &quot;Menjadi Jemaat yang Serupa dengan Kristus Yesus&quot; dan Misi ESC untuk menyelamatkan jiwa-jiwa, menjadi murid Kristus yang memuridkan, serta hidup saling mengasihi (Yohanes 13:34-35), Next Step menawarkan serangkaian Tahap atau Langkah yang terarah untuk menuntun jemaat ke dalam kedewasaan rohani sesuai Visi dan Misi ESC.</p>

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
                <div class="row">
                    <div class="col-12 col-md-6">
                        <article class="postcard light blue">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark pl-3">
                                <h1 class="postcard__title blue "><a href="#">Foundation Class 1</a></h1>

                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">kelas pengajaran dasar yang bertujuan untuk memperlengkapi jemaat dengan pemahaman yang mendalam tentang dasar iman Kristen, terutama mengenai baptisan dan keselamatan.</div>
                                <ul class="postcard__tagbox">
                                    <!-- <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> -->
                                    <li class="tag__item play blue text-dark">
                                        <a href="#"></i>Read More</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-6">
                        <article class="postcard light red">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/501/500" alt="Image Title" />

                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title red"><a href="#">Membership Class</a></h1>

                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">program khusus yang dirancang oleh gereja untuk memperkenalkan jemaat baru atau calon anggota pada visi, misi, dan nilai-nilai gereja.</div>
                                <ul class="postcard__tagbox">
                                    <!-- <li class="tag__item"><i class="fas fa-tag mr-2"></i>Next Step</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>Membership Class.</li> -->
                                    <li class="tag__item play red text-dark">
                                        <a href="#">Read more</a>
                                    </li>
                                </ul>
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
                                <h1 class="postcard__title green"><a href="#">Foundation Class 2</a></h1>

                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">kelas pengajaran yang dirancang untuk memperlengkapi jemaat dalam memahami makna, kuasa, dan peran doa dalam kehidupan Kristen. Dalam kelas ini, jemaat belajar bahwa doa bukan sekadar aktivitas religius, tetapi adalah komunikasi yang intim dengan Tuhan</div>
                                <ul class="postcard__tagbox">

                                    <li class="tag__item play green text-dark">
                                        <a href="#"></i>Read More</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6">
                        <article class="postcard light yellow">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title yellow"><a href="#">Foundation Class 3</a></h1>

                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">kelas pembinaan yang berfokus pada pemulihan gambar diri dan penyembuhan luka batin melalui pelayanan pelepasan. Dalam kelas ini, jemaat diajak untuk melihat identitas sejati mereka sebagai anak-anak Allah, dibebaskan dari belenggu rasa tidak berharga, luka emosional, dan pengalaman masa lalu yang menyakitkan.</div>
                                <ul class="postcard__tagbox">

                                    <li class="tag__item play yellow text-dark">
                                        <a href="#"></i>Read More</a>
                                    </li>
                                </ul>
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
                                <h1 class="postcard__title green"><a href="#">Grade 1</a></h1>

                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">kelas pengajaran yang mendalam bagi jemaat untuk memahami doktrin dasar kekristenan, mencakup topik penting seperti Alkitab, Yesus Kristus, dan keselamatan. Kelas ini bertujuan untuk memberikan fondasi teologis yang kokoh,</div>
                                <ul class="postcard__tagbox">

                                    <li class="tag__item play green text-dark">
                                        <a href="#"></i>Read More</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6">
                        <article class="postcard light yellow">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title yellow"><a href="#">Grade 2</a></h1>

                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">kelas pengajaran yang dirancang untuk memperkenalkan jemaat pada doktrin dan peran Roh Kudus dalam kehidupan orang percaya.</div>
                                <ul class="postcard__tagbox">

                                    <li class="tag__item play yellow text-dark">
                                        <a href="#"></i>Read More</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <article class="postcard light green">
                                <a class="postcard__img_link" href="#">
                                    <img class="postcard__img" src="https://picsum.photos/500/501" alt="Image Title" />
                                </a>
                                <div class="postcard__text t-dark">
                                    <h1 class="postcard__title green"><a href="#">Grade 3</a></h1>

                                    <div class="postcard__bar"></div>
                                    <div class="postcard__preview-txt">kelas pengajaran yang mendalami doktrin akhir zaman, membantu jemaat memahami peristiwa-peristiwa penting yang akan terjadi sesuai nubuatan Alkitab. </div>
                                    <ul class="postcard__tagbox">

                                        <li class="tag__item play green text-dark">
                                            <a href="#"></i>Read More</a>
                                        </li>
                                    </ul>
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
                                    <div class="postcard__preview-txt">kelas yang dirancang untuk mempersiapkan jemaat menjadi pelayan aktif di gereja. Kelas ini membantu jemaat memahami pentingnya pelayanan sebagai bentuk kasih dan pengabdian kepada Tuhan dan sesama.</div>
                                    <ul class="postcard__tagbox">

                                        <li class="tag__item play yellow text-dark">
                                            <a href="#"></i>Read More</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>


            </div>
            </div>
        </section>


    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>