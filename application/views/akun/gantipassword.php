<?php $this->load->view('template/festavalive/header'); ?>

<body>
    <style>
        .informasi-akun table td {
            font-size: 10px;
            padding: 0px 0px 0px 0px;
        }

        .informasi-akun h5 {
            font-size: 12px;
            color: #655f62;
            font-weight: bold;
        }
    </style>
    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">Ubah Password</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo site_url('akun/simpanubahpassword') ?>" method="post">

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group row">
                                                <label for="" class="col-md-3">Password Lama</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="passwordlama" id="passwordlama" placeholder="************">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="form-group row">
                                                <label for="" class="col-md-3">Password Baru</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="passwordbaru1" id="passwordbaru1" placeholder="************">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="form-group row">
                                                <label for="" class="col-md-3">Ulangi Password Baru</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="passwordbaru2" id="passwordbaru2" placeholder="************">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-sm btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
                                            <a href="<?php echo site_url('akun/profil') ?>" class="btn btn-sm btn-default float-end mr-2">Kembali</a>
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

    <script>
        $(document).on('change', '#foto', function(e) {
            $('#formUpload').submit();
        });
    </script>

</body>

</html>