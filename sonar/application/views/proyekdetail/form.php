<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Proyekdetail</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('Proyekdetail')) ?>">Proyekdetail</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <form action="<?php echo(site_url('Proyekdetail/simpan')) ?>" method="post" id="form">                      
        <div class="row">
          <div class="col-md-12">
            <div class="card" id="cardcontent">
              <div class="card-header">
                <h5 class="card-title" id="lbljudul"></h5>
              </div>
              <div class="card-body">

                  <div class="col-md-12">
                    <?php 
                      $pesan = $this->session->flashdata("pesan");
                      if (!empty($pesan)) {
                        echo $pesan;
                      }
                    ?>
                  </div> 

                  <input type="hidden" name="" id="">                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">idproyek</label>
                    <div class="col-md-9">
                      <input type="text" name="idproyek" id="idproyek" class="form-control" placeholder="Masukkan idproyek">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">idprogrammer</label>
                    <div class="col-md-9">
                      <input type="text" name="idprogrammer" id="idprogrammer" class="form-control" placeholder="Masukkan idprogrammer">
                    </div>
                  </div>
              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('Proyekdetail')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var  = "<?php echo($) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if (  != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("Proyekdetail/get_edit_data") ?>', 
              data        : {: }, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            $("#").val(result.);
            $("#idproyek").val(result.idproyek);
            $("#idprogrammer").val(result.idprogrammer);
          }); 


          $("#lbljudul").html("Edit Data Proyekdetail");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Proyekdetail");
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
        idproyek: {
          validators:{
            notEmpty: {
                message: "idproyek tidak boleh kosong"
            },
          }
        },
        idprogrammer: {
          validators:{
            notEmpty: {
                message: "idprogrammer tidak boleh kosong"
            },
          }
        },      }
    });
  //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


    $("form").attr('autocomplete', 'off');
    //$("#tanggal").mask("00-00-0000", {placeholder:"hh-bb-tttt"});
    //$("#jumlah").mask("000,000,000,000", {reverse: true});
  }); //end (document).ready
  

</script>

</body>
</html>
