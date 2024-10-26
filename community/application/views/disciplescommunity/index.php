<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Daftar DC <?php echo $rowDC->namadc; ?></h4>
    </div>
    <div class="col-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo (site_url('dcmember')) ?>">Disciples Community Member</a></li>
            <li class="breadcrumb-item active" id="lblactive"></li>
        </ol>

    </div>
</div>

<div class="row" id="toni-content">
    <div class="col-md-12">




        <form action="<?php echo (site_url('dcmember/simpan')) ?>" method="post" id="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" id="cardcontent">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

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




<script type="text/javascript">
    var iddcmember = "<?php echo $iddcmember ?>";


    $(document).ready(function() {

        $('.select2').select2();
        //---------------------------------------------------------> JIKA EDIT DATA
        if (iddcmember != "") {

            $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("dcmember/get_edit_data") ?>',
                    data: {
                        iddcmember: iddcmember
                    },
                    dataType: 'json',
                    encode: true
                })
                .done(function(result) {
                    console.log(result);
                    console.log("test");

                    $("#idjemaat").val(result.idjemaat).trigger('change');
                    $("#iddcmember").val(result.iddcmember).trigger('change');
                    $("#iddc").val(result.iddc).trigger('change');
                    $("#statuskeanggotaan").val(result.statuskeanggotaan);
                    $("#keterangan").val(result.keterangan);
                    $("#statusaktif").val(result.statusaktif);

                });


            $("#lbljudul").html("Edit Data DC");
            $("#lblactive").html("Edit");

        } else {
            $("#lbljudul").html("Tambah Data DC");
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
                namadc: {
                    validators: {
                        notEmpty: {
                            message: "nama dc tidak boleh kosong"
                        },
                    }
                },
                kategoridc: {
                    validators: {
                        notEmpty: {
                            message: "kategori dc tidak boleh kosong"
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