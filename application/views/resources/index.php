<?php $this->load->view('template/festavalive/header'); ?>

<<<<<<< Updated upstream

=======
<meta charset="utf-8">
<title> home</title>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Raleway:300,400,500,700">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
>>>>>>> Stashed changes

<body>


    <style>
        /*--------------------------------------------------------------
        # Hero Section
        --------------------------------------------------------------*/
        #hero {
            width: 100%;
            height: 40vh;
            background: url("<?php echo base_url('images/banner2.jpg') ?>") center center;
            background-size: cover;
            position: relative;
        }

        #hero .container {
            padding-top: 80px;
        }

        #hero:before {
            content: "";
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #hero h1 {
            margin: 0 0 10px 0;
            font-size: 48px;
            font-weight: 700;
            line-height: 56px;
            color: #fff;
        }

        #hero h2 {
            color: #eee;
            margin-bottom: 40px;
            font-size: 15px;
            font-weight: 500;
            font-family: "Open Sans", sans-serif;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        #hero .btn-get-started {
            font-family: "Poppins", sans-serif;
            text-transform: uppercase;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 8px 28px;
            border-radius: 50px;
            transition: 0.5s;
            margin: 10px;
            border: 2px solid #fff;
            color: #fff;
        }

        #hero .btn-get-started:hover {
            background: #EE6F09;
            border: 2px solid #EE6F09;
        }

        @media (min-width: 1024px) {
            #hero {
                background-attachment: fixed;
            }
        }

        @media (max-width: 768px) {
            #hero {
                height: 100vh;
            }

            #hero .container {
                padding-top: 60px;
            }

            #hero h1 {
                font-size: 32px;
                line-height: 36px;
            }
        }
    </style>

    <style>
<<<<<<< Updated upstream
        #map {
            height: 700px;
        }

        .link-popup {
            font-size: 14px;
            float: right;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

    <style>
        .ulCabang li {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .ulCabang li a {
            text-decoration: none;
            color: #243EAE;
            font-size: 16px;
        }
    </style>


    <!-- nav menu style -->
    <style>
        .hoverable {
            display: inline-block;
            backface-visibility: hidden;
            vertical-align: middle;
            position: relative;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            tranform: translateZ(0);
            transition-duration: .3s;
            transition-property: transform;
        }

        .hoverable:before {
            position: absolute;
            pointer-events: none;
            z-index: -1;
            content: '';
            top: 100%;
            left: 5%;
            height: 10px;
            width: 90%;
            opacity: 0;
            background: -webkit-radial-gradient(center, ellipse, rgba(255, 255, 255, 0.35) 0%, rgba(255, 255, 255, 0) 80%);
            background: radial-gradient(ellipse at center, rgba(255, 255, 255, 0.35) 0%, rgba(255, 255, 255, 0) 80%);
            /* W3C */
            transition-duration: 0.3s;
            transition-property: transform, opacity;
        }

        .hoverable:hover,
        .hoverable:active,
        .hoverable:focus {
            transform: translateY(-5px);
        }

        .hoverable:hover:before,
        .hoverable:active:before,
        .hoverable:focus:before {
            opacity: 1;
            transform: translateY(-5px);
        }



        @keyframes bounce-animation {
            16.65% {
                -webkit-transform: translateY(8px);
                transform: translateY(8px);
            }

            33.3% {
                -webkit-transform: translateY(-6px);
                transform: translateY(-6px);
            }

            49.95% {
                -webkit-transform: translateY(4px);
                transform: translateY(4px);
            }

            66.6% {
                -webkit-transform: translateY(-2px);
                transform: translateY(-2px);
            }

            83.25% {
                -webkit-transform: translateY(1px);
                transform: translateY(1px);
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }

        .bounce {
            animation-name: bounce-animation;
            animation-duration: 2s;
        }



        /*everything below here is just setting up the page, so dont worry about it */


        @media (min-width: 768px) {
            .navbar {
                text-align: center !important;
                float: none;
                display: inline-block;
            }
        }

        body {
            background-color: rgba(0, 0, 0, 1);
            font-weight: 600;
            text-align: center !important;
            color: white;
        }

        nav {
            background: none !important;
            text-transform: uppercase;

            li {
                margin-left: 3em;
                margin-right: 3em;

                a {
                    transition: .5s color ease-in-out;
                }
            }
        }

        .page-title {
            opacity: .75 !important;
        }
    </style>

=======
        .light-background {
            --background-color: #f9f9f9;
            --surface-color: #ffffff;
        }

        .dark-background {
            --background-color: #2a2c39;
            --default-color: #ffffff;
            --heading-color: #ffffff;
            --surface-color: #404356;
            --contrast-color: #ffffff;
        }

        /* Smooth scroll */
        :root {
            scroll-behavior: smooth;
        }

        /*--------------------------------------------------------------
# General Styling & Shared Classes
--------------------------------------------------------------*/
        body {
            color: var(--default-color);
            background-color: var(--background-color);
            font-family: var(--default-font);
        }

        a {
            color: var(--accent-color);
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            color: color-mix(in srgb, var(--accent-color), transparent 25%);
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--heading-color);
            font-family: var(--heading-font);
        }

     
        /*--------------------------------------------------------------
# Global Header
--------------------------------------------------------------*/
        .header {
            --background-color: rgba(255, 255, 255, 0);
            --heading-color: #ffffff;
            color: var(--default-color);
            background-color: var(--background-color);
            padding: 20px 0;
            transition: all 0.5s;
            z-index: 997;
        }

        .header .logo {
            line-height: 1;
        }

        .header .logo img {
            max-height: 32px;
            margin-right: 8px;
        }

        .header .logo h1 {
            font-size: 30px;
            margin: 0;
            font-weight: 700;
            color: var(--heading-color);
        }

        .scrolled .header {
            box-shadow: 0px 0 18px rgba(0, 0, 0, 0.1);
        }

        /* Global Header on Scroll
------------------------------*/
        .scrolled .header {
            --background-color: rgba(42, 44, 57, 0.9);
        }

   


        /*--------------------------------------------------------------
# Global Page Titles & Breadcrumbs
--------------------------------------------------------------*/
        .page-title {
            color: var(--default-color);
            background-color: var(--background-color);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 160px 0 80px 0;
            text-align: center;
            position: relative;
        }

        .page-title:before {
            content: "";
            background-color: color-mix(in srgb, var(--background-color), transparent 50%);
            position: absolute;
            inset: 0;
        }

        .page-title h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .page-title .breadcrumbs ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            justify-content: center;
            padding: 0;
            margin: 0;
            font-size: 16px;
            font-weight: 400;
        }

        .page-title .breadcrumbs ol li+li {
            padding-left: 10px;
        }

        .page-title .breadcrumbs ol li+li::before {
            content: "/";
            display: inline-block;
            padding-right: 10px;
            color: color-mix(in srgb, var(--default-color), transparent 50%);
        }

        /*--------------------------------------------------------------
# Global Sections
--------------------------------------------------------------*/
        section,
        .section {
            color: var(--default-color);
            background-color: var(--background-color);
            padding: 60px 0;
            scroll-margin-top: 77px;
            overflow: clip;
        }

        /*--------------------------------------------------------------
# Global Section Titles
--------------------------------------------------------------*/
        .section-title {
            padding-bottom: 60px;
            position: relative;
        }

        .section-title h2 {
            font-size: 14px;
            font-weight: 500;
            padding: 0;
            line-height: 1px;
            margin: 0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: color-mix(in srgb, var(--default-color), transparent 50%);
            position: relative;
        }

        .section-title h2::after {
            content: "";
            width: 120px;
            height: 1px;
            display: inline-block;
            background: var(--accent-color);
            margin: 4px 10px;
        }

        .section-title p {
            color: var(--heading-color);
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            text-transform: uppercase;
            font-family: var(--heading-font);
        }

 
  
        /*--------------------------------------------------------------
# Call To Action Section
--------------------------------------------------------------*/
        .call-to-action {
            padding: 80px 0;
            position: relative;
            clip-path: inset(0);
        }

        .call-to-action .container {
            position: relative;
            z-index: 3;
        }

        .call-to-action h3 {
            color: var(--default-color);
            font-size: 28px;
            font-weight: 700;
        }

        .call-to-action p {
            color: var(--default-color);
        }

        .call-to-action .cta-btn {
            font-family: var(--heading-font);
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 40px;
            border-radius: 50px;
            transition: 0.5s;
            margin: 10px;
            background: var(--accent-color);
            color: var(--contrast-color);
        }

        .call-to-action .cta-btn:hover {
            background: color-mix(in srgb, var(--accent-color) 90%, white 15%);
        }

        /*--------------------------------------------------------------
# Services Section
--------------------------------------------------------------*/
        .services .service-item {
            background-color: var(--surface-color);
            box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
            padding: 60px 30px 60px 70px;
            transition: all ease-in-out 0.3s;
            border-radius: 18px;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .services .service-item .icon {
            position: absolute;
            left: -20px;
            top: calc(50% - 30px);
        }

        .services .service-item .icon i {
            font-size: 64px;
            line-height: 1;
            transition: 0.5s;
        }

        .services .service-item h3 {
            font-weight: 700;
            margin: 10px 0 15px 0;
            font-size: 22px;
            transition: ease-in-out 0.3s;
        }

        .services .service-item p {
            line-height: 24px;
            font-size: 14px;
            margin-bottom: 0;
        }

        @media (min-width: 1365px) {
            .services .service-item:hover {
                transform: translateY(-10px);
            }

            .services .service-item:hover h3 {
                color: var(--accent-color);
            }
        }

        /*--------------------------------------------------------------
# Portfolio Section
--------------------------------------------------------------*/
        .portfolio .portfolio-filters {
            padding: 0;
            margin: 0 auto 20px auto;
            list-style: none;
            text-align: center;
        }

        .portfolio .portfolio-filters li {
            cursor: pointer;
            display: inline-block;
            padding: 8px 20px 10px 20px;
            margin: 0;
            font-size: 15px;
            font-weight: 500;
            line-height: 1;
            margin-bottom: 5px;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            font-family: var(--heading-font);
        }

        .portfolio .portfolio-filters li:hover,
        .portfolio .portfolio-filters li.filter-active {
            color: var(--contrast-color);
            background-color: var(--accent-color);
        }

        .portfolio .portfolio-filters li:first-child {
            margin-left: 0;
        }

        .portfolio .portfolio-filters li:last-child {
            margin-right: 0;
        }

        @media (max-width: 575px) {
            .portfolio .portfolio-filters li {
                font-size: 14px;
                margin: 0 0 10px 0;
            }
        }

        .portfolio .portfolio-item {
            position: relative;
            overflow: hidden;
        }

        .portfolio .portfolio-item .portfolio-info {
            opacity: 0;
            position: absolute;
            left: 12px;
            right: 12px;
            bottom: -100%;
            z-index: 3;
            transition: all ease-in-out 0.5s;
            background: color-mix(in srgb, var(--surface-color), transparent 10%);
            padding: 15px;
        }

        .portfolio .portfolio-item .portfolio-info h4 {
            font-size: 18px;
            font-weight: 600;
            padding-right: 50px;
        }

        .portfolio .portfolio-item .portfolio-info p {
            color: color-mix(in srgb, var(--default-color), transparent 30%);
            font-size: 14px;
            margin-bottom: 0;
            padding-right: 50px;
        }

        .portfolio .portfolio-item .portfolio-info .preview-link,
        .portfolio .portfolio-item .portfolio-info .details-link {
            position: absolute;
            right: 50px;
            font-size: 24px;
            top: calc(50% - 14px);
            color: color-mix(in srgb, var(--default-color), transparent 30%);
            transition: 0.3s;
            line-height: 0;
        }

        .portfolio .portfolio-item .portfolio-info .preview-link:hover,
        .portfolio .portfolio-item .portfolio-info .details-link:hover {
            color: var(--accent-color);
        }

        .portfolio .portfolio-item .portfolio-info .details-link {
            right: 14px;
            font-size: 28px;
        }

        .portfolio .portfolio-item:hover .portfolio-info {
            opacity: 1;
            bottom: 0;
        }

        
      
       

 
    </style>






>>>>>>> Stashed changes
    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
<<<<<<< Updated upstream
                        <h2 class="text-white text-center mb-4 mt-3">OUR LOCATION</h2>
=======
                        <h2 class="text-white text-center mb-4 mt-3">RESOURCES</h2>
>>>>>>> Stashed changes
                    </div>

                </div>
            </div>
        </section>

<<<<<<< Updated upstream
        <section>
            <div class="container">
                <div class="container-fluid">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li><a id="len1" class="hoverable" href="#">Home</a></li>
                                <li><a id="len2" class="hoverable" href="#">About</a></li>
                                <li><a id="len3" class="hoverable" href="#">Portfolio</a></li>
                                <li><a id="len4" class="hoverable" href="#">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div id="what-the-hell-is-this">
                        <div class="page-title">
                            <h2>Simple Navigation</h2>
                            <p class="lead">
                                Based on Hover.css, the goal of this pen
                                is to create a simple navigation bar <br />
                                that can be easily reused in both mobile and native displays. Mouse over the nav text for animation!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>




=======


        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our</h2>
                <p>Resources</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item  position-relative" style="background-image: url('https://images.unsplash.com/photo-1502781252888-9143ba7f074e?q=80&w=3271&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
                            <div class="icon">
                                <i class="bi bi-cash-stack" style="color: #0dcaf0;"></i>
                            </div>
                            <a href="<?php echo base_url('resources/kids');?>" class="stretched-link">
                                <h3>KIDS</h3>
                            </a>
                            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week" style="color: #fd7e14;"></i>
                            </div>
                            <a href="<?php echo base_url('resources/youth');?>" class="stretched-link">
                                <h3>YOUTH</h3>
                            </a>
                            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-text" style="color: #20c997;"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Ledo Markt</h3>
                            </a>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-credit-card-2-front" style="color: #df1529;"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Asperiores Commodit</h3>
                            </a>
                            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-globe" style="color: #6610f2;"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Velit Doloremque</h3>
                            </a>
                            <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-clock" style="color: #f3268c;"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Dolori Architecto</h3>
                            </a>
                            <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->
>>>>>>> Stashed changes




    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>



</body>

</html>