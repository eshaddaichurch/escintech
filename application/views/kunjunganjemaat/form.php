<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">PERMOHONAN KUNJUNGAN JEMAAT</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 p-5">
                        <form action="<?php echo site_url('kunjunganjemaat/simpan') ?>" method="POST" id="form">
                            <input type="hidden" name="idkunjunganjemaat" id="idkunjunganjemaat">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <h5 id="lbljudul">Tambah Permohonan Kunjungan</h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Jenis Kunjungan</label>
                                        <div class="col-md-8">
                                            <select name="idjeniskunjunganjemaat" id="idjeniskunjunganjemaat" class="form-control select2">
                                                <option value="">Pilih jenis kunjungan....</option>
                                                <?php
                                                $rsJenisKunjungan = $this->db->query("select * from carekunjunganjemaatjenis where statusaktif='Aktif'");
                                                if ($rsJenisKunjungan->num_rows() > 0) {
                                                    foreach ($rsJenisKunjungan->result() as $row) {
                                                        echo '
                                                            <option value="' . $row->idjeniskunjunganjemaat . '">' . $row->namajeniskunjunganjemaat . '</option>
                                                            ';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">No HP Yang Bisa Dihubungi</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nohpyangbisadihubungi" id="nohpyangbisadihubungi" class="form-control" placeholder="Nomor HP">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Alamat Lengkap</label>
                                        <div class="col-md-8">
                                            <textarea name="alamatjemaat" id="alamatjemaat" class="form-control" rows="2" placeholder="Alamat / lokasi tempat yang akan di kunjungi"><?php echo $this->session->userdata('alamatrumah'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Keterangan Permohonan</label>
                                        <div class="col-md-8">
                                            <textarea name="keterangankunjungan" id="keterangankunjungan" class="form-control" rows="10" placeholder="Jelaskan maksud dan tujuan dari permohonan kunjungan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-5 d-none d-md-block">
                                    <a href="<?php echo site_url('permohonansaya') ?>" class="btn btn-default mr-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                </div>
                                <div class="col-12 text-center mt-5 d-md-none d-sm-block">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
                                    <a href="<?php echo site_url('permohonansaya') ?>" class="btn btn-default mr-1">Kembali</a>
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
        var idkunjunganjemaat = "<?php echo $idkunjunganjemaat; ?>";
        // console.log(idkunjunganjemaat);

        $(document).ready(function() {
            $('.select2').select2();
            //---------------------------------------------------------> JIKA EDIT DATA
            if (idkunjunganjemaat != "") {


                $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("kunjunganjemaat/get_edit_data") ?>',
                        data: {
                            idkunjunganjemaat: idkunjunganjemaat
                        },
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(result) {
                        console.log(result);
                        $("#idkunjunganjemaat").val(result.idkunjunganjemaat);
                        $("#idjeniskunjunganjemaat").val(result.idjeniskunjunganjemaat).trigger('change');
                        $("#nohpyangbisadihubungi").val(result.nohpyangbisadihubungi);
                        $("#keterangankunjungan").val(result.keterangankunjungan);
                        $("#alamatjemaat").val(result.alamatjemaat);

                    });
                // command2

                $("#lbljudul").html("Ubah Permohonan Kunjungan");
            } else {
                $("#lbljudul").html("Tambah Permohonan Kunjungan");
            }


            $("#form").bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    idjeniskunjunganjemaat: {
                        validators: {
                            notEmpty: {
                                message: "Jenis kunjungan tidak boleh kosong"
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
                    alamatjemaat: {
                        validators: {
                            notEmpty: {
                                message: "Alamat tidak boleh kosong"
                            },
                        }
                    },
                    keterangankunjungan: {
                        validators: {
                            notEmpty: {
                                message: "Keterangan tidak boleh kosong"
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