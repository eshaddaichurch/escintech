<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">PELAYANAN KEMATIAN</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 p-5">
                        <form action="<?php echo site_url('kematian/simpan') ?>" method="POST" id="form">
                            <input type="hidden" name="idkematian" id="idkematian">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <h5 id="lbljudul">Tambah Permohonan Pelayanan Kematian</h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Nama Yang Meninggal</label>
                                        <div class="col-md-8">
                                            <input type="text" name="namayangmeninggal" id="namayangmeninggal" class="form-control" placeholder="Nama yang meninggal" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Jenis Kelamin Yang Meninggal</label>
                                        <div class="col-md-8">
                                            <select name="jeniskelaminyangmeninggal" id="jeniskelaminyangmeninggal" class="form-control select2">
                                                <option value="">Pilih jenis kelamin yang meninggal...</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Tanggal Meninggal</label>
                                        <div class="col-md-3">
                                            <input type="date" name="tglmeninggal" id="tglmeninggal" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Umur Yang Meninggal</label>
                                        <div class="col-md-3">
                                            <input type="number" name="umuryangmeninggal" id="umuryangmeninggal" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Hubungan Keluarga</label>
                                        <div class="col-md-8">
                                            <select name="hubungankeluarga" id="hubungankeluarga" class="form-control select2">
                                                <option value="">Pilih hubungan dengan yang meninggal...</option>
                                                <option value="Ayah/ Ibu">Ayah/ Ibu</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Kakak/ Adik">Kakak/ Adik</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">No HP Yang Bisa Dihubungi</label>
                                        <div class="col-md-4">
                                            <input type="text" name="nohpyangbisadihubungi" id="nohpyangbisadihubungi" class="form-control" placeholder="Nomor HP">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Keterangan Permohonan Pelayanan Kematian</label>
                                        <div class="col-md-8">
                                            <textarea name="keteranganpermohonan" id="keteranganpermohonan" class="form-control" rows="10" placeholder="Uraikan keterangan tentang pelayanan kematian yang dibutuhkan.."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-5 d-none d-md-block">
                                    <a href="<?php echo site_url('kematian') ?>" class="btn btn-default mr-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                </div>

                                <div class="col-12 text-center mt-5 d-md-none d-sm-block">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                    <a href="<?php echo site_url('kematian') ?>" class="btn btn-default mr-1">Kembali</a>
                                </div>



                            </div>

                        </form>
                    </div>




                </div>
            </div>
        </section>






    </main>


    <?php $this->load->view('template/festavalive/footer'); ?>

    <script>
        var idkematian = "<?php echo $idkematian; ?>";

        $(document).ready(function() {

            $('.select2').select2();

            //---------------------------------------------------------> JIKA EDIT DATA
            if (idkematian != "") {


                console.log(idkematian);
                $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("kematian/get_edit_data") ?>',
                        data: {
                            idkematian: idkematian
                        },
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(result) {
                        console.log(result);
                        $("#idkematian").val(result.idkematian);
                        $("#namayangmeninggal").val(result.namayangmeninggal);
                        $("#hubungankeluarga").val(result.hubungankeluarga).trigger('change');
                        $("#tglmeninggal").val(result.tglmeninggal);

                        $("#jeniskelaminyangmeninggal").val(result.jeniskelaminyangmeninggal).trigger('change');
                        $("#umuryangmeninggal").val(result.umuryangmeninggal);

                        $("#nohpyangbisadihubungi").val(result.nohpyangbisadihubungi);
                        $("#keteranganpermohonan").val(result.keterangan);

                    });
                // command2

                $("#lbljudul").html("Ubah Permohonan Pelayanan Kematian");
            } else {
                $("#lbljudul").html("Tambah Permohonan Pelayanan Kematian");
            }

            $("#form").bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    namayangmeninggal: {
                        validators: {
                            notEmpty: {
                                message: "Nama yang meninggal tidak boleh kosong"
                            },
                        }
                    },
                    jeniskelaminyangmeninggal: {
                        validators: {
                            notEmpty: {
                                message: "Jenis kelamin yang meninggal tidak boleh kosong"
                            },
                        }
                    },
                    tglmeninggal: {
                        validators: {
                            notEmpty: {
                                message: "Tanggal meninggal tidak boleh kosong"
                            },
                        }
                    },
                    umuryangmeninggal: {
                        validators: {
                            notEmpty: {
                                message: "Umur yang meninggal tidak boleh kosong"
                            },
                        }
                    },
                    hubungankeluarga: {
                        validators: {
                            notEmpty: {
                                message: "Hubungan dengan yang meninggal tidak boleh kosong"
                            },
                        }
                    },
                    nohpyangbisadihubungi: {
                        validators: {
                            notEmpty: {
                                message: "Nomor hp yang bisa dihubungi tidak boleh kosong"
                            },
                        }
                    },
                    keteranganpermohonan: {
                        validators: {
                            notEmpty: {
                                message: "Keterangan permohonan tidak boleh kosong"
                            },
                        }
                    },
                }
            });
        });
    </script>

</body>

</html>