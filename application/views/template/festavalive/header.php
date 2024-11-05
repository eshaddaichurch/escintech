<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url('images/icon.png') ?>" rel="icon">
    <title>El Shaddai Church</title>


  


    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="<?php echo base_url('assets/FestavaLive/') ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/FestavaLive/') ?>css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/FestavaLive/') ?>css/templatemo-festava-live.css" rel="stylesheet">

    <!-- Font Awesome Icons 5.1 -->
    <link rel="stylesheet" href="<?php echo (base_url()) ?>admin/assets/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- custom -->
    <link href="<?php echo (base_url()) ?>admin/assets/custom/custom.css" rel="stylesheet" />


    <!-- select2 -->
    <link href="<?php echo (base_url()) ?>admin/assets/select2/css/select2.min.css" rel="stylesheet" />
    <style>
        /*** Navbar ***/


        @media (max-width: 991.98px) {
            .navbar .navbar-nav {
                margin-top: 10px;
                border-top: 1px solid rgba(255, 255, 255, .3);
                background: var(--dark);
            }

            .navbar .navbar-nav .nav-link {
                padding: 10px 0;
            }
        }

        @media (min-width: 992px) {
            .navbar .nav-item .dropdown-menu {
                display: block;
                visibility: hidden;
                top: 100%;
                transform: rotateX(-75deg);
                transform-origin: 0% 0%;
                transition: .5s;
                opacity: 0;
            }

            .navbar .nav-item:hover .dropdown-menu {
                transform: rotateX(0deg);
                visibility: visible;
                transition: .5s;
                opacity: 1;
            }
        }

        .page-content {
            min-height: 500px;
        }


        .select2,
        .select2-search__field,
        .select2-results__option {
            font-size: 1.0em !important;
        }

        .select2-selection__rendered {
            /*line-height: 2em !important;*/
        }

        .select2-container .select2-selection--single {
            height: 2em !important;
            /* height: 40px; */
        }

        .select2-selection__arrow {
            height: 2em !important;
        }

        .form-group>.select2-container {
            width: 100% !important;
        }

        .select2-container {
            width: 100% !important;
        }

        .card-mobile .judul {
            font-size: 20px;
            font-weight: bold;
        }

        .card-mobile .sub-judul {
            font-size: 12px;
            margin-top: -5px;
            margin-bottom: 20px;
        }

        .card-mobile .judul-content {
            font-size: 12px;
            font-weight: bold;
        }

        .card-mobile .isi-content {
            font-size: 12px;
        }
    </style>



    <!-- TemplateMo 583 Festava Live

    https://templatemo.com/tm-583-festava-live -->

</head>