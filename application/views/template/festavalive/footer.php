    <footer class="site-footer">
        <div class="site-footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="text-white mb-lg-0">El shaddai Church</h2>
                    </div>

                    <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                        <ul class="social-icon d-flex justify-content-lg-end">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-twitter"><?php echo $rowinfogereja->urltwittergereja ?></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="<?php echo $rowinfogereja->urlinstagramgereja ?>" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="<?php echo $rowinfogereja->urlfacebookgereja ?>" class="social-icon-link">
                                    <span class="bi-facebook"></span>
                                </a>
                            </li>

                            <!-- <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-youtube"></span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-4 pb-2">
                    <h5 class="site-footer-title mb-3">Our Links</h5>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="<?php echo site_url() ?>/pages/read/WE9USVFmA2EIYg~~/jesus" class="site-footer-link">About Jesus</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Class Registration</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Our Service</a>
                        </li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Have a question?</h5>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: 090-080-0760" class="site-footer-link">
                            +62 855 5000 1187
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:hello@company.com" class="site-footer-link">
                            elshaddaichurch@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Location</h5>

                    <p class="text-white d-flex mt-3 mb-2">
                        Jl. Prof. M. Yamin No.1 A Pontianak Kalimantan Barat</p>

                    <a class="link-fx-1 color-contrast-higher mt-3" href="<?php echo site_url('') ?>/ourlocation/index/V05TSFJlBWcLYQ~~">
                        <span>Our Maps</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mt-5">
                        <p class="copyright-text">Copyright © 2023 - <?php echo date('Y') ?> Elshaddai Church</p>
                        <p class="copyright-text">Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
                    </div>

                    <div class="col-lg-8 col-12 mt-lg-5">
                        <ul class="site-footer-links">
                            <!-- <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Terms &amp; Conditions</a>
                            </li> -->

                            <!-- <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Privacy Policy</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Your Feedback</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--

T e m p l a t e M o


-->
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 50%;
            height: 50%;
            z-index: 9999;
            background: url('<?php echo base_url("images/Spinner-3.gif") ?>') 100% 100% no-repeat;
        }
    </style>
    <div class="loader"></div>


    <!-- JAVASCRIPT FILES -->
    <script src="<?php echo base_url('assets/FestavaLive/') ?>js/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url('assets/FestavaLive/') ?>js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/FestavaLive/') ?>js/jquery.sticky.js"></script>
    <script src="<?php echo base_url('assets/FestavaLive/') ?>js/click-scroll.js"></script>
    <script src="<?php echo base_url('assets/FestavaLive/') ?>js/custom.js"></script>



    <!-- datatables -->
    <script src="<?php echo (base_url()) ?>admin/assets/datatables2/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript" src="<?php echo base_url(); ?>admin/assets/bootbox/bootbox.js"></script>

    <!-- jquery-confirm  -->
    <script src="<?php echo (base_url("admin/assets/")) ?>jquery-confirm/js/jquery-confirm.min.js"></script>

    <!-- jquery-mask -->
    <script type="text/javascript" src="<?php echo base_url("admin/assets/") ?>jquery_mask/jquery.mask.js"></script>

    <!-- Bootstrap validator -->
    <script src="<?php echo (base_url("admin/assets/")) ?>bootstrap-validator/js/bootstrapValidator.js"></script>

    <!-- jquery-ui -->
    <script src="<?php echo (base_url("admin/assets/")) ?>jquery-ui/jquery-ui-2.js"></script>

    <!-- select2 -->
    <script src="<?php echo (base_url()) ?>admin/assets/select2/js/select2.min.js"></script>

    <!-- CK Editor -->
    <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
    <script src="<?php echo base_url(); ?>admin/assets/ckeditor/ckeditor.js"></script>

    <script src="<?php echo (base_url()) ?>admin/assets/sweetalert/sweetalert.min.js"></script>



    <script>
        var $loading = $('.loader').hide();
        $('.select2').select2();

        $(document)
            .ajaxStart(function() {
                //ajax request went so show the loading image
                $loading.show();
            })
            .ajaxStop(function() {
                //got response so hide the loading image
                $loading.hide();
            });
    </script>




    <?php
    $pesan = $this->session->flashdata('pesan');
    if (!empty($pesan)) {
        echo $pesan;
    }
    ?>



    <?php
    $this->load->view('loginModal');
    $this->load->view('registrasiModal');
    ?>

    <script>
        $('.show-form-login').click(function(e) {
            e.preventDefault();
            $('#registrasiModal').modal('hide');
            $('#loginModal').modal('show');
        });

        $('.show-form-registrasi').click(function(e) {
            e.preventDefault();
            $('#loginModal').modal('hide');
            $('#registrasiModal').modal('show');
        });

        $(document).on('click', '.dropdown-item', function(e) {
            e.stopPropagation();
            window.location = $(this).attr('href');
        });
    </script>