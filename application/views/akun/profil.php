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

                    <div class="col-12 mb-5 text-center">
                        <h3>Status: <?php echo $rowProfil->statusjemaat; ?></h3>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo site_url('akun/simpanupload') ?>" method="post" id="formUpload" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h5>Foto Profil</h5>
                                        </div>
                                        <div class="col-12 text-center">
                                            <?php
                                            if (!empty($rowProfil->foto)) {
                                                echo '
                                                        <img src="' . base_url('admin/uploads/jemaat/' . $rowProfil->foto) . '" alt="" style="width: 50%;" class="rounded-circle">
                                                    ';
                                            } else {
                                                echo '
                                                        <img src="' . base_url('images/nofoto.png') . '" alt="" style="width: 50%;" class="rounded-circle">
                                                    ';
                                            }
                                            ?>

                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <input type="file" class="btn btn-sm btn-primary" id="foto" name="foto">
                                            <input type="hidden" id="foto_lama" name="foto_lama">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>



                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">


                                    <?php
                                    if ($rowProfil->statusjemaat == 'Registered') { ?>
                                        <div class="col-12 informasi-akun">
                                            <h5>Data Pribadi</h5>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 15%;">Nama Lengkap</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->namalengkap; ?></td>
                                                        <td style="width: 15%;">Email</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->email; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%;">Jenis Kelamin</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->jeniskelamin; ?></td>
                                                        <td style="width: 15%;">Nomor HP</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->nohp; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    <?php } else { ?>

                                        <div class="col-12 informasi-akun">
                                            <h5>Data Pribadi</h5>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 15%;">Nama</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->namalengkap; ?></td>
                                                        <td style="width: 15%;">Tempat/ Tgl.Lahir</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->tempatlahir . '/ ' . tglindonesia($rowProfil->tanggallahir) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%;">Jenis Kelamin</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->jeniskelamin; ?></td>
                                                        <td style="width: 15%;">Status Pernikahan</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->statuspernikahan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%;">Alamat Rumah</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->alamatrumah; ?></td>
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
                                                        <td style="width: 30%;"><?php echo $rowProfil->namadarurat; ?></td>
                                                        <td style="width: 15%;">Hubungan</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->hubungan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%;">Nomor Telp.</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->notelpdarurat; ?></td>
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
                                                        <td style="width: 30%;"><?php echo $rowProfil->instagram; ?></td>
                                                        <td sty
                                                            le="width: 15%;">Facebook</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->facebook; ?></td>
                                                    </tr>
                                                    <tr>

                                                        <td style="width: 15%;">No. HP</td>
                                                        <td style="width: 5%;">:</td>
                                                        <td style="width: 30%;"><?php echo $rowProfil->nohp; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>



                                    <div class="col-12 d-grid gap-2 mt-3">
                                        <a href="<?php echo site_url('akun/ubahprofil') ?>" class="btn btn-sm btn-primary">Ubah Profil</a>
                                        <a href="<?php echo site_url('akun/gantipassword') ?>" class="btn btn-sm btn-warning">Ubah Password</a>
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
        $(document).on('change', '#foto', function(e) {
            $('#formUpload').submit();
        });
    </script>

</body>

</html>