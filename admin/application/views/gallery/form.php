<?php
$this->load->view("template/header");
$this->load->view("template/topmenu");
$this->load->view("template/sidemenu");
?>

<div class="row" id="toni-breadcrumb">
  <div class="col-6">
    <h4 class="text-dark mt-2">Gallery</h4>
  </div>
  <div class="col-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo (site_url()) ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo (site_url('gallery')) ?>">Gallery</a></li>
      <li class="breadcrumb-item active">Detail Gambar</li>
    </ol>

  </div>
</div>


<div class="row" id="toni-content">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="card" id="cardcontent">
          <div class="card-header">
            <h5 class="card-title">Detail Gambar Gallery</h5>
          </div>
          <div class="card-body">



            <div class="col-md-12">



              <form action="<?php echo (site_url('gallery/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="" class="col-form-label col-md-3">Judul Gambar</label>
                      <div class="col-md-9">
                        <input type="text" name="judulgambar" id="judulgambar" class="form-control" placeholder="Judul gambar">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="" class="col-form-label col-md-3">Upload Gambar Gallery</label>
                      <div class="col-md-9">
                        <input type="file" name="filegallery" id="filegallery" class="" accept="image/*">
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-success float-right" type="submit"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?php echo (site_url('gallery')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
                  </div>

                </div>
              </form>

            </div>


          </div> <!-- ./card-body -->


        </div> <!-- /.card -->
      </div> <!-- /.col -->
    </div>
  </div>
</div> <!-- /.row -->
<!-- Main row -->



<?php $this->load->view("template/footer") ?>




<script type="text/javascript">
  var idproduk = "<?php echo ($idproduk) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    table = $("#table").DataTable();




    //----------------------------------------------------------------- > validasi
    $('#form').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        judulgambar: {
          validators: {
            notEmpty: {
              message: "judul gambar tidak boleh kosong"
            },
          }
        },
      }
    });
    //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    // $('#tglterima').mask('00-00-0000', {placeholder:"hh-bb-tttt"});
    // $('#hargabelisatuan').mask('000,000,000,000', {reverse: true, placeholder:"000,000,000,000"});
  }); //end (document).ready



  $(document).on("click", "#hapus", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();
    bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
      if (result) {
        document.location.href = link;
      }
    });
  });
</script>


</body>

</html>