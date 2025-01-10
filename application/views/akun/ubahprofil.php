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


                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">


                                <?php
                                if ($rowProfil->statusjemaat == 'Registered') { ?>

                                    <form action="<?php echo site_url('akun/simpanregistered') ?>" method="post">

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Nomor HP</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="nohp" placeholder="081300000000" value="<?php echo $rowProfil->nohp ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-sm btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
                                                <a href="<?php echo site_url('akun/profil') ?>" class="btn btn-sm btn-default float-end mr-2">Kembali</a>
                                            </div>
                                        </div>
                                    </form>

                                <?php } else { ?>

                                    <form action="<?php echo site_url('akun/simpanjemaat') ?>" method="post">

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group row mb-1">
                                                    <label for="" class="col-md-3">Nomor HP</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="nohp" id="nohp" placeholder="081300000000" value="<?php echo $rowProfil->nohp; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label for="" class="col-md-3">Alamat Rumah</label>
                                                    <div class="col-md-9">
                                                        <textarea name="alamatrumah" id="alamatrumah" class="form-control" placeholder="Alamat Rumah"><?php echo $rowProfil->alamatrumah ?></textarea>
                                                    </div>
                                                </div>

                                                <h5 class="mt-3">Kontak Darurat</h5>

                                                <div class="form-group row mb-1">
                                                    <label for="" class="col-md-3">Nama</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="namadarurat" id="namadarurat" placeholder="Nama" value="<?php echo $rowProfil->namadarurat ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label for="" class="col-md-3">Hubungan</label>
                                                    <div class="col-md-9">
                                                        <select name="hubungan" id="hubungan" class="select2">
                                                            <option value="">Pilih Hubungan</option>
                                                            <option value="Istri/ Suami" <?php echo ($rowProfil->hubungan == 'Istri/ Suami') ? 'selected="selected"' : '' ?>>Istri/ Suami</option>
                                                            <option value="Ibu" <?php echo ($rowProfil->hubungan == 'Ibu') ? 'selected="selected"' : '' ?>>Ibu</option>
                                                            <option value="Ayah" <?php echo ($rowProfil->hubungan == 'Ayah') ? 'selected="selected"' : '' ?>>Ayah</option>
                                                            <option value="Anak" <?php echo ($rowProfil->hubungan == 'Anak') ? 'selected="selected"' : '' ?>>Anak</option>
                                                            <option value="Saudara" <?php echo ($rowProfil->hubungan == 'Saudara') ? 'selected="selected"' : '' ?>>Saudara</option>
                                                            <option value="Kerabat" <?php echo ($rowProfil->hubungan == 'Kerabat') ? 'selected="selected"' : '' ?>>Kerabat</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label for="" class="col-md-3">No HP</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="notelpdarurat" id="notelpdarurat" placeholder="081300000000" value="<?php echo $rowProfil->notelpdarurat ?>">
                                                    </div>
                                                </div>

                                                <h5 class="mt-3 mb-1">Sosial Media</h5>
                                                <div class="form-group row mb-1">
                                                    <label for="" class="col-md-3">Instagram</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $rowProfil->instagram ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1">
                                                    <label for="" class="col-md-3">Facebook</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $rowProfil->facebook ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-sm btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
                                                <a href="<?php echo site_url('akun/profil') ?>" class="btn btn-sm btn-default float-end mr-2">Kembali</a>
                                            </div>
                                        </div>
                                    </form>

                                <?php } ?>









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