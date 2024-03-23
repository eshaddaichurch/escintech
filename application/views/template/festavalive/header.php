<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url('images/icon.png') ?>" rel="icon">
    <title>Elshaddai Church</title>

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
    </style>
    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
</head>