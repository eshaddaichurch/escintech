 

 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Otorisasi</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('otorisasi')) ?>">Otorisasi</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('otorisasi/simpanotorisasi')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">Data Otorisasi</h3><hr>                    

                  <input type="hidden" name="idotorisasi" id="idotorisasi">   

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Otorisasi</label>
                    <div class="col-md-9">
                      <input type="text" name="namaotorisasi" id="namaotorisasi" class="form-control" placeholder="Nama otorisasi">
                    </div>
                  </div> 


              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('otorisasi')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idotorisasi = "<?php echo($idotorisasi) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idotorisasi != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("otorisasi/get_edit_data") ?>', 
              data        : {idotorisasi: idotorisasi}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            $("#idotorisasi").val(result.idotorisasi);
            $("#tglhagah").val(result.tglhagah);
            $("#idkitab").val(result.idkitab).trigger('change');
            $("#pasal1").val(result.pasal1);
            $("#pasal2").val(result.pasal2);

          }); 


          $("#lbljudul").html("Edit Data Jemaat");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Jemaat");
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
        kitab: {
          validators:{
            notEmpty: {
                message: "kitab tidak boleh kosong"
            },
          }
        },
        pasal1: {
          validators:{
            notEmpty: {
                message: "pasal awal tidak boleh kosong"
            },
          }
        },
        pasal2: {
          validators:{
            notEmpty: {
                message: "pasal akhir tidak boleh kosong"
            },
          }
        },
      }
    });
  //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  

</script>

</body>
</html>
