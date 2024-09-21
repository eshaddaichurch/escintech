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
                        <h2 class="text-white text-center mb-4 mt-3">Profil Saya</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5>Foto Profil</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <img src="<?php echo base_url('images/nofoto.png') ?>" alt="" style="width: 80%;">
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12 informasi-akun">
                                        <h5>Data Pribadi</h5>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 15%;">Nama</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                    <td style="width: 15%;">Tempat/ Tgl.Lahir</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Jenis Kelamin</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                    <td style="width: 15%;">Status Pernikahan</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Alamat Rumah</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-12 mt-3 informasi-akun">
                                        <h5>Kontak Darurat</h5>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 15%;">Nama</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                    <td style="width: 15%;">Hubungan</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Nomor Telp.</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-12 mt-3 informasi-akun">
                                        <h5>Sosial Media</h5>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 15%;">Instagram</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                    <td style="width: 15%;">Facebook</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Email</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                    <td style="width: 15%;">No. HP</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 30%;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>



                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </section>






    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>

    <script>

    </script>

</body>

</html>