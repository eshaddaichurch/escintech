<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">PERMOHONAN PENYERAHAN ANAK</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 p-5">
                        <form action="<?php echo site_url('penyerahananak/simpan') ?>" method="POST" id="form">
                            <input type="hidden" name="idpenyerahananak" id="idpenyerahananak">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <h5 id="lbljudul">Form Permohonan Penyerahan Anak</h5>
                                </div>
                                <div class="col-12">

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Nama Lengkap Anak</label>
                                        <div class="col-md-8">
                                            <input type="text" name="namaanak" id="namaanak" class="form-control" placeholder="Nama lengkap anak" autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Tempat/ Tanggal Lahir</label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Tempat lahir">
                                                </div>
                                                <label for="" class="col-md-1">/</label>
                                                <div class="col-md-4">
                                                    <input type="date" name="tgllahir" id="tgllahir" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Nama Lengkap Ayah</label>
                                        <div class="col-md-8">
                                            <input type="text" name="namaayah" id="namaayah" class="form-control" placeholder="Nama lengkap ayah">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Nama Lengkap Ibu</label>
                                        <div class="col-md-8">
                                            <input type="text" name="namaibu" id="namaibu" class="form-control" placeholder="Nama lengkap ibu">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">No HP Yang Bisa Dihubungi</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nohpyangbisadihubungi" id="nohpyangbisadihubungi" class="form-control" placeholder="Nomor HP">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Keterangan Permohonan</label>
                                        <div class="col-md-8">
                                            <textarea name="keteranganpermohonan" id="keteranganpermohonan" class="form-control" rows="10" placeholder="Keterangan (Optional)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-5 d-none d-md-block">
                                    <a href="<?php echo site_url('penyerahananak') ?>" class="btn btn-default mr-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                </div>
                                <div class="col-12 text-center mt-5 d-md-none d-sm-block">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                    <a href="<?php echo site_url('penyerahananak') ?>" class="btn btn-default mr-1">Kembali</a>
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
        var idpenyerahananak = "<?php echo $idpenyerahananak; ?>";
        // console.log(idpenyerahananak);

        $(document).ready(function() {

            //---------------------------------------------------------> JIKA EDIT DATA
            if (idpenyerahananak != "") {


                $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("penyerahananak/get_edit_data") ?>',
                        data: {
                            idpenyerahananak: idpenyerahananak
                        },
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(result) {
                        // console.log(result);
                        $("#idpenyerahananak").val(result.idpenyerahananak);
                        $("#namaanak").val(result.namaanak);
                        $("#tempatlahir").val(result.tempatlahir);
                        $("#tgllahir").val(result.tgllahir);
                        $("#namaayah").val(result.namaayah);
                        $("#namaibu").val(result.namaibu);

                        $("#nohpyangbisadihubungi").val(result.nohpyangbisadihubungi);
                        $("#keteranganpermohonan").val(result.keteranganpermohonan);

                    });
                // command2

                $("#lbljudul").html("Ubah Form Permohonan Penyerahan Anak");
            } else {
                $("#lbljudul").html("Tambah Form Permohonan Penyerahan Anak");
            }


            $("#form").bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    namaanak: {
                        validators: {
                            notEmpty: {
                                message: "Nama anak tidak boleh kosong"
                            },
                        }
                    },
                    tempatlahir: {
                        validators: {
                            notEmpty: {
                                message: "Tempat lahir tidak boleh kosong"
                            },
                        }
                    },
                    tgllahir: {
                        validators: {
                            notEmpty: {
                                message: "tanggal lahir tidak boleh kosong"
                            },
                        }
                    },
                    namaayah: {
                        validators: {
                            notEmpty: {
                                message: "nama ayah tidak boleh kosong"
                            },
                        }
                    },
                    namaibu: {
                        validators: {
                            notEmpty: {
                                message: "nama ibu tidak boleh kosong"
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
                },
                onSuccess: function(e, data) {
                    // e.preventDefault();

                    // console.log("1");

                    // if ($('#optradioBergabung1').prop('checked') === false && $('#optradioBergabung2').prop('checked') === false) {
                    //   e.preventDefault();
                    //   swal("Upss", "Silahkan pilih apakah anda hanya ingin berkunjung atau ingin bergabung di El Shaddai Church.", "info")
                    //     .then(function() {
                    //       $('#optradioBergabung1').focus();
                    //     });
                    //   return false;
                    // }
                    // console.log("3");

                    // $('#btnDaftar').prop('disabled', true);
                }
            });
        });
    </script>

</body>

</html>