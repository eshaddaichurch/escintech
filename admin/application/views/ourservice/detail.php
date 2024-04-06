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
            <li class="breadcrumb-item active"><?= $rowOurservice->namaourservice ?></li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">



        <form action="<?php echo (site_url('ourservice/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" id="cardcontent">
                        <div class="card-header">
                            <h5 class="card-title"><?= $rowOurservice->namaourservice ?></h5>
                            <a href="#" class="btn btn-sm btn-primary float-right" id="btnTambahDetail"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $pesan = $this->session->flashdata("pesan");
                                    if (!empty($pesan)) {
                                        echo $pesan;
                                    }
                                    ?>
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <?php

                                        if ($rsOurserviceDetail->num_rows() > 0) {
                                            foreach ($rsOurserviceDetail->result() as $rowDetail) {
                                                echo '

                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-body shadow">
                                                            <div class="row">
                                                                <div class="col-12 text-center">
                                                                    <img src="' . base_url('images/nofoto.png') . '" alt="" style="width: 80%; height: 150px;">
                                                                </div>
                                                                <div class="col-12 text-center mt-3">
                                                                    <h5>SUB THEMA</h5>
                                                                    <p>PS. Wilan</p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <button class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i></button>
                                                                    <button class="btn btn-sm btn-warning float-right mr-1"><i class="fa fa-edit"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                    ';
                                            }
                                        } else {
                                            echo '
                                                    <div class="col-md-12 text-center">
                                                        <i>Data tidak ditemukan ...</i>
                                                    </div>
                                            ';
                                        }
                                        ?>


                                    </div>

                                </div>
                            </div>






                        </div> <!-- ./card-body -->

                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div>
        </form>





    </div>
</div> <!-- /.row -->
<!-- Main row -->



<?php $this->load->view("template/footer") ?>

<div class="modal fade" id="OurserviceModal" tabindex="-1" aria-labelledby="OurserviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OurserviceModalLabel">Our Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="" id="formOurservice">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tglourservice" id="tglourservice" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Nama Pastor</label>
                                    <input type="text" name="namapastor" id="namapastor" class="form-control" placeholder="Nama Pastor">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Sub Tema</label>
                                    <input type="text" name="subtema" id="subtema" class="form-control" placeholder="Sub Tema">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Url Youtube</label>
                                    <input type="text" name="urlyoutube" id="urlyoutube" class="form-control" placeholder="https://www.youtube.com/watch?v=J_Ir5vzwcqw">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsidetail" id="deskripsidetail" class="form-control" rows="3" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

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


    $('#btnTambahDetail').click(function(e) {
        e.preventDefault();

        $('#OurserviceModal').modal('show');
        $('#namapastor').focus();

        $('#namapastor').val('');
        $('#subtema').val('');
        $('#urlyoutube').val('');

        CKEDITOR.replace('deskripsidetail', {
            filebrowserImageBrowseUrl: '<?php echo base_url('uploads/galery'); ?>',
            height: ['400px'],
        });
        CKEDITOR.instances.deskripsidetail.setData('');



    })
</script>

</body>

</html>