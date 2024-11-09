<?php $this->load->view('template/festavalive/header'); ?>



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

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">OUR LOCATION</h2>
                    </div>

                </div>
            </div>
        </section>

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








    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>



</body>

</html>