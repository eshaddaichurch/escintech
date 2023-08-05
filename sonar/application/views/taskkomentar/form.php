<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Taskkomentar</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('Taskkomentar')) ?>">Taskkomentar</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">
      <form action="<?php echo(site_url('Taskkomentar/simpan')) ?>" method="post" id="form">                      
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

                  <input type="hidden" name="idtaskkomentar" id="idtaskkomentar">                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">tgltaskkomentar</label>
                    <div class="col-md-9">
                      <input type="text" name="tgltaskkomentar" id="tgltaskkomentar" class="form-control" placeholder="Masukkan tgltaskkomentar">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">idtask</label>
                    <div class="col-md-9">
                      <input type="text" name="idtask" id="idtask" class="form-control" placeholder="Masukkan idtask">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">idprojectmanager</label>
                    <div class="col-md-9">
                      <input type="text" name="idprojectmanager" id="idprojectmanager" class="form-control" placeholder="Masukkan idprojectmanager">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">idprogrammer</label>
                    <div class="col-md-9">
                      <input type="text" name="idprogrammer" id="idprogrammer" class="form-control" placeholder="Masukkan idprogrammer">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">komentar</label>
                    <div class="col-md-9">
                      <input type="text" name="komentar" id="komentar" class="form-control" placeholder="Masukkan komentar">
                    </div>
                  </div>
              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('Taskkomentar')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idtaskkomentar = "<?php echo($idtaskkomentar) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idtaskkomentar != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("Taskkomentar/get_edit_data") ?>', 
              data        : {idtaskkomentar: idtaskkomentar}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            $("#idtaskkomentar").val(result.idtaskkomentar);
            $("#tgltaskkomentar").val(result.tgltaskkomentar);
            $("#idtask").val(result.idtask);
            $("#idprojectmanager").val(result.idprojectmanager);
            $("#idprogrammer").val(result.idprogrammer);
            $("#komentar").val(result.komentar);
          }); 


          $("#lbljudul").html("Edit Data Taskkomentar");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Taskkomentar");
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
        tgltaskkomentar: {
          validators:{
            notEmpty: {
                message: "tgltaskkomentar tidak boleh kosong"
            },
          }
        },
        idtask: {
          validators:{
            notEmpty: {
                message: "idtask tidak boleh kosong"
            },
          }
        },
        idprojectmanager: {
          validators:{
            notEmpty: {
                message: "idprojectmanager tidak boleh kosong"
            },
          }
        },
        idprogrammer: {
          validators:{
            notEmpty: {
                message: "idprogrammer tidak boleh kosong"
            },
          }
        },
        komentar: {
          validators:{
            notEmpty: {
                message: "komentar tidak boleh kosong"
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
