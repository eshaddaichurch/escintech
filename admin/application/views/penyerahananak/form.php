<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Penyerahan Anak</h4>
    </div>
    <div class="col-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo (site_url('penyerahananak')) ?>">Penyerahan Anak</a></li>
            <li class="breadcrumb-item active" id="lblactive">Proses</li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">



        <form action="<?php echo (site_url('penyerahananak/simpan')) ?>" method="post" id="form">
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

                            <h3 class="text-gray">Permohonan Konseling</h3>
                            <hr>

                            <input type="hidden" name="idpenyerahananak" id="idpenyerahananak" value="<?php echo $rowPenyerahanAnak->idpenyerahananak ?>">

                            <div class="form-group row">
                                <div class="col-12 mb-3">
                                    <h4>Detail Pemohon</h4>
                                    <div class="table-responsive">
                                        <table class="table table-infojemaat">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20%;">Nama Pemohon</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->namalengkap; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Tanggal Permohonan</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo formatHariTanggal($rowPenyerahanAnak->tglinsert); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">No Hp Yang Bisa Dihubungi</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->nohpyangbisadihubungi; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Email</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Keterangan Permohonan</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->keteranganpermohonan; ?></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <h4>Informasi Anak</h4>
                                    <div class="table-responsive">
                                        <table class="table table-infojemaat">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20%;">Nama Anak</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->namaanak; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Tempat/ Tgl Lahir</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->tempatlahir . ' / ' . tglindonesia($rowPenyerahanAnak->tgllahir); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Nama Ayah</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->namaayah; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;">Nama Ibu</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td style="width: 75%;"><?php echo $rowPenyerahanAnak->namaibu; ?></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="keteranganadmin" class="col-md-4 col-form-label">Keterangan</label>
                                        <div class="col-md-8">
                                            <textarea name="keteranganadmin" id="keteranganadmin" class="form-control" rows="3" placeholder="Keterangan"></textarea>
                                        </div>
                                    </div>
                                </div>



                            </div>






                        </div> <!-- ./card-body -->

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary status float-right" name="status" value="Disetujui">
                            <input type="submit" class="btn btn-danger status float-right mr-1" name="status" value="Ditolak">

                            <a href="<?php echo (site_url('penyerahananak')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
    var idpenyerahananak = "<?php echo ($idpenyerahananak) ?>";

    $(document).ready(function() {

        $('.select2').select2();
        //---------------------------------------------------------> JIKA EDIT DATA
        if (idpenyerahananak != "") {
            $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("permohonandoa/get_edit_data") ?>',
                    data: {
                        idpenyerahananak: idpenyerahananak
                    },
                    dataType: 'json',
                    encode: true
                })
                .done(function(result) {
                    // console.log(result);
                    $("#idpenyerahananak").val(result.idpenyerahananak);
                    $("#namapenanggungjawab").val(result.namapenanggungjawab);
                    $("#idpenanggungjawab").val(result.idpenanggungjawab);
                    $("#keteranganadmin").val(result.keteranganadmin);
                    console.log("3");

                });
        }


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
                        callback: {
                            message: 'Berikan keterangan alasan penolakan',
                            callback: function(value, validator, keteranganadmin) {

                                if ($('.status').val() == 'Ditolak') {
                                    return {
                                        valid: false,
                                        message: 'Berikan keterangan alasan penolakan'
                                    }
                                }
                                return true
                            }
                        }
                    }
                }
            }
        });


        $("form").attr('autocomplete', 'off');
        $("#rtrw").mask("000/000", {
            placeholder: "000/000"
        });
    }); //end (document).ready
</script>

</body>

</html>