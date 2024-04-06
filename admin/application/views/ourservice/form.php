<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Our Service</h4>
    </div>
    <div class="col-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo (site_url('ourservice')) ?>">Our Service</a></li>
            <li class="breadcrumb-item active" id="lblactive"></li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">



        <form action="<?php echo (site_url('ourservice/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
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

                            <h3 class="text-gray">Data Our Service</h3>
                            <hr>

                            <input type="hidden" name="idourservice" id="idourservice">
                            <div class="form-group row required">
                                <label for="" class="col-md-3 col-form-label">Nama Our Service</label>
                                <div class="col-md-9">
                                    <input type="text" name="namaourservice" id="namaourservice" class="form-control" placeholder="Nama Our Service" autofocus="">
                                    <p id="slug"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Deskripsi Singkat</label>
                                <div class="col-md-9">
                                    <textarea name="deskripsisingkat" id="deskripsisingkat" class="form-control" rows="3" placeholder="Deskripsi Singkat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label for="" class="col-md-3 col-form-label">Deskripsi Our Service</label>
                                <div class="col-md-9">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Our Service"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Range Umur</label>
                                <div class="col-md-9">
                                    <input type="text" name="rangeumur" id="rangeumur" class="form-control" placeholder="Range Umur" autofocus="">
                                </div>
                            </div>

                            <div class="form-group row required" style="display: none;">
                                <label for="" class="col-md-3 col-form-label">Url Video</label>
                                <div class="col-md-9">
                                    <input type="text" name="urlvideo" id="urlvideo" class="form-control" placeholder="Url Video" autofocus="">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Gambar Sampul <small>(Ukuran Gambar Yang Disarankan 300 x 225 px) </small></label>
                                <div class="col-md-9">
                                    <input type="file" name="gambarsampul" id="gambarsampul" class="form-control" placeholder="Pilih Uplad">
                                    <input type="hidden" name="gambarsampul_lama" id="gambarsampul_lama">
                                    <a href="" id="gambarsampul_url" target="_blank"></a>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="" class="col-md-3 col-form-label">Status Aktif</label>
                                <div class="col-md-9">
                                    <select name="statusaktif" id="statusaktif" class="form-control">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>



                        </div> <!-- ./card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="<?php echo (site_url('ourservice')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
    var idourservice = "<?php echo ($idourservice) ?>";
    console.log(idourservice);

    $(document).ready(function() {

        $('.select2').select2();

        //---------------------------------------------------------> JIKA EDIT DATA
        if (idourservice != "") {
            $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("ourservice/get_edit_data") ?>',
                    data: {
                        idourservice: idourservice
                    },
                    dataType: 'json',
                    encode: true
                })
                .done(function(result) {
                    console.log(result);
                    $("#idourservice").val(result.idourservice);
                    $("#namaourservice").val(result.namaourservice);
                    $("#deskripsisingkat").val(result.deskripsisingkat);
                    $("#rangeumur").val(result.rangeumur);
                    $("#urlvideo").val(result.urlvideo);
                    $("#statusaktif").val(result.statusaktif);
                    $("#gambarsampul_url").html(result.gambarsampul);
                    $("#gambarsampul_url").attr('href', "<?php echo base_url('uploads/ourservice/') ?>" + result.gambarsampul);
                    $('#lblslug').html(result.slug);


                    CKEDITOR.replace('deskripsi', {
                        filebrowserImageBrowseUrl: '<?php echo base_url('uploads/galery'); ?>',
                        height: ['400px'],
                    });
                    CKEDITOR.instances.deskripsi.setData(result.deskripsi);
                });


            $("#lbljudul").html("Edit Data Kategori Pages");
            $("#lblactive").html("Edit");

        } else {

            CKEDITOR.replace('deskripsi', {
                filebrowserImageBrowseUrl: '<?php echo base_url('uploads/galery'); ?>',
                height: ['400px'],
            });

            $("#lbljudul").html("Tambah Data Kategori Pages");
            $("#lblactive").html("Tambah");
        }

        //----------------------------------------------------------------- > validasi
        $("#form").bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                namaourservice: {
                    validators: {
                        notEmpty: {
                            message: "nama our service tidak boleh kosong"
                        },
                    }
                },
            }
        });
        //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


        $("form").attr('autocomplete', 'off');
        $("#rtrw").mask("000/000", {
            placeholder: "000/000"
        });
    }); //end (document).ready
</script>

</body>

</html>