<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Permohonan Pernikahan</h4>
    </div>
    <div class="col-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo (site_url('pernikahan')) ?>">Pernikahan</a></li>
            <li class="breadcrumb-item active" id="lblactive">Proses</li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">



        <form action="<?php echo (site_url('pernikahan/simpan')) ?>" method="post" id="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" id="cardcontent">
                        <div class="card-body">

                            <div class="col-md-12">
                                <?php
                                $pesan = $this->session->flashdata("pesan");
                                if (!empty($pesan)) {
                                    echo $pesan;
                                }
                                ?>
                            </div>
                            <input type="hidden" name="idpernikahan" id="idpernikahan" value="<?php echo $rowPernikahan->idpernikahan ?>">

                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-muted">Informasi Pemohon</h5>
                                    <div class="table-responsive">
                                        <table class="table table-infojemaat">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20%;">Nama Pemohon</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->namalengkap; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Jenis Kelamin</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->jeniskelamin; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Tanggal Permohonan</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo formatHariTanggal($rowPernikahan->tglinsert); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Email</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">No HP</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->nohpyangbisadihubungi; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Keterangan Permohonan</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->keterangan; ?></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Informasi Mempelai Pria</h5>
                                    <div class="table-responsive">
                                        <table class="table table-infojemaat">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20%;">Nama Mempelai</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->namamempelaipria; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Nama Ayah</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->namaayahpria; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Nama Ibu</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->namaibupria; ?></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Informasi Mempelai Wanita</h5>
                                    <div class="table-responsive">
                                        <table class="table table-infojemaat">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20%;">Nama Mempelai</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->namamempelaiwanita; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Nama Ayah</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->namaayahwanita; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Nama Ibu</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPernikahan->namaibuwanita; ?></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Tanggal Pernikahan</label>
                                        <div class="col-md-3">
                                            <input type="date" name="tglpernikahan" id="tglpernikahan" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Keterangan</label>
                                        <div class="col-md-8">
                                            <textarea name="keteranganadmin" id="keteranganadmin" class="form-control" rows="5" placeholder="Keterangan"><?php echo $rowPernikahan->keteranganadmin ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div> <!-- ./card-body -->

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary float-right" name="status" value="Disetujui">
                            <input type="submit" class="btn btn-danger float-right mr-1" name="status" value="Ditolak">

                            <a href="<?php echo (site_url('pernikahan')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div>
        </form>





    </div>
</div> <!-- /.row -->
<!-- Main row -->



<?php $this->load->view("template/footer") ?>



<script type="text/javascript">
    var idpernikahan = "<?php echo ($idpernikahan) ?>";
    console.log("1");

    $(document).ready(function() {
        console.log("2");

        $('.select2').select2();


        //---------------------------------------------------------> JIKA EDIT DATA
        if (idpernikahan != "") {
            $.ajax({
                    type: 'POST',
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
                    $("#tglpernikahan").val(result.tglpernikahan);
                    $("#keteranganadmin").val(result.keteranganadmin);

                    console.log("3");

                });
        }

        console.log("4");

        //----------------------------------------------------------------- > validasi
        $("#form").bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                keteranganadmin: {
                    validators: {
                        notEmpty: {
                            message: "keterangan tidak boleh kosong"
                        },
                    }
                },
                tglpernikahan: {
                    validators: {
                        notEmpty: {
                            message: "tanggal tidak boleh kosong"
                        },
                    }
                },
            }
        });

        $("form").attr('autocomplete', 'off');
        $("#rtrw").mask("000/000", {
            placeholder: "000/000"
        });
    }); //end (document).ready


    $("#namapenanggungjawab").autocomplete({
            minLength: 1,
            source: function(request, response) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Ajax/autocomplateJemaat'); ?>",
                    dataType: "json",
                    data: {
                        'cari': request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            focus: function(event, ui) {
                $('#idpenanggungjawab').val(ui.item.idjemaat);
                return false;
            },
            select: function(event, ui) {
                $('#namapenanggungjawab').val(ui.item.namalengkap);
                $('#idpenanggungjawab').val(ui.item.idjemaat);
                return false;
            }
        })
        .autocomplete("instance")._renderItem = function(ul, item) {

            return $("<li>")
                .append("<div class='row'><div class='col-12'><strong>" + item.namalengkap + "</strong></div><div class='col-12'><small>Nomor AJ: " + item.noaj + "</small></div></div>")
                .appendTo(ul);
        };
</script>

</body>

</html>