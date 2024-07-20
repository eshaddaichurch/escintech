<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">PERMOHONAN PERNIHAKAN</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 p-5">
                        <form action="<?php echo site_url('pernikahan/simpan') ?>" method="POST" id="form">
                            <input type="hidden" name="idpernikahan" id="idpernikahan">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <h5 id="lbljudul">Tambah Permohonan Pernikahan</h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">No HP Yang Bisa Dihubungi</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nohpyangbisadihubungi" id="nohpyangbisadihubungi" class="form-control" placeholder="Nomor HP">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Keterangan Permohonan</label>
                                        <div class="col-md-8">
                                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Jelaskan dengan singkat seperti tahun dan tanggal pernikahan yang anda mohonkan."></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <h5 class="text-muted">Informasi Mempelai Pria</h5>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 col-form-label">Nama Mempelai</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="namamempelaipria" id="namamempelaipria" placeholder="Nama mempelai pria">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 col-form-label">Nama Ayah</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="namaayahpria" id="namaayahpria" placeholder="Nama ayah mempelai pria">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 col-form-label">Nama Ibu</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="namaibupria" id="namaibupria" placeholder="Nama ibu mempelai pria">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <h5 class="text-muted">Informasi Mempelai Wanita</h5>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 col-form-label">Nama Mempelai</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="namamempelaiwanita" id="namamempelaiwanita" placeholder="Nama mempelai wanita">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 col-form-label">Nama Ayah</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="namaayahwanita" id="namaayahwanita" placeholder="Nama ayah mempelai wanita">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 col-form-label">Nama Ibu</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="namaibuwanita" id="namaibuwanita" placeholder="Nama ibu mempelai wanita">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 text-center mt-5 d-none d-md-block">
                                    <a href="<?php echo site_url('pernikahan') ?>" class="btn btn-default mr-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                </div>
                                <div class="col-12 text-center mt-5 d-md-none d-sm-block">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                    <a href="<?php echo site_url('pernikahan') ?>" class="btn btn-default mr-1">Kembali</a>
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
        var idpernikahan = "<?php echo $idpernikahan; ?>";
        // console.log(idpernikahan);

        $(document).ready(function() {

            //---------------------------------------------------------> JIKA EDIT DATA
            if (idpernikahan != "") {


                $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("pernikahan/get_edit_data") ?>',
                        data: {
                            idpernikahan: idpernikahan
                        },
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(result) {
                        // console.log(result);
                        $("#idpernikahan").val(result.idpernikahan);
                        $("#nohpyangbisadihubungi").val(result.nohpyangbisadihubungi);
                        $("#keterangan").val(result.keterangan);
                        $("#namamempelaipria").val(result.namamempelaipria);
                        $("#namaayahpria").val(result.namaayahpria);
                        $("#namaibupria").val(result.namaibupria);

                        $("#namamempelaiwanita").val(result.namamempelaiwanita);
                        $("#namaayahwanita").val(result.namaayahwanita);
                        $("#namaibuwanita").val(result.namaibuwanita);

                        if (result.namajemaat == 'toni') {
                            return;
                        }
                    });
                // command2

                $("#lbljudul").html("Ubah Permohonan Pernikahan");
            } else {
                $("#lbljudul").html("Tambah Permohonan Pernikahan");
            }


            $("#form").bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    tglpermohonan: {
                        validators: {
                            notEmpty: {
                                message: "tanggal permohonan tidak boleh kosong"
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