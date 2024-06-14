<?php $this->load->view('template/festavalive/header'); ?>

<body>

    <main>



        <?php $this->load->view('template/festavalive/topmenu'); ?>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 mb-4 mb-lg-0">
                        <h2 class="text-white text-center mb-4 mt-3">PERMOHONAN DOA</h2>
                    </div>

                </div>
            </div>
        </section>



        <section class="page-content section-padding">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12">
                        <form action="<?php echo site_url('permohonandoa/simpan') ?>" method="POST" id="form">
                            <input type="hidden" name="idpermohonan" id="idpermohonan">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <h5 id="lbljudul">Tambah Permohonan Doa</h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-md-4">Jenis Permohonan Doa</label>
                                        <div class="col-md-8">
                                            <select name="idjenispermohonandoa" id="idjenispermohonandoa" class="form-control select2">
                                                <option value="">Pilih jenis permohonan doa...</option>
                                                <?php
                                                $rsJenisPermohonan = $this->db->query("select * from carepermohonandoa_jenis where statusaktif='Aktif' order by namajenispermohonandoa");
                                                if ($rsJenisPermohonan->num_rows() > 0) {
                                                    foreach ($rsJenisPermohonan->result() as $row) {
                                                        echo '
                                                            <option value="' . $row->idjenispermohonandoa . '">' . $row->namajenispermohonandoa . '</option>
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
                                        <label for="" class="col-md-4">Keterangan Permohonan</label>
                                        <div class="col-md-8">
                                            <textarea name="keteranganpermohonan" id="keteranganpermohonan" class="form-control" rows="10" placeholder="Uraikan pokok doa yang ingin didoakan.."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-5">
                                    <a href="<?php echo site_url('permohonandoa') ?>" class="btn btn-default mr-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan Permohonan</button>
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
        var idpermohonan = "<?php echo $idpermohonan; ?>";

        $(document).ready(function() {

            $('.select2').select2();

            //---------------------------------------------------------> JIKA EDIT DATA
            if (idpermohonan != "") {


                console.log(idpermohonan);
                $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("permohonandoa/get_edit_data") ?>',
                        data: {
                            idpermohonan: idpermohonan
                        },
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(result) {
                        console.log(result);
                        $("#idpermohonan").val(result.idpermohonan);
                        $("#idjenispermohonandoa").val(result.idjenispermohonandoa).trigger('change');
                        $("#nohpyangbisadihubungi").val(result.nohpyangbisadihubungi);
                        $("#keteranganpermohonan").val(result.perihaldoa);

                    });
                // command2

                $("#lbljudul").html("Ubah Permohonan Doa");
            } else {
                $("#lbljudul").html("Tambah Permohonan Doa");
            }

            $("#form").bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    idjenispermohonandoa: {
                        validators: {
                            notEmpty: {
                                message: "Jenis permohonan doa tidak boleh kosong"
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