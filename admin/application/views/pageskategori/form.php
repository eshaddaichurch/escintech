 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Pages Kategori</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('pageskategori')) ?>">Pages Kategori</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('pageskategori/simpan')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">Data Kategori Page</h3><hr>                    

                  <input type="hidden" name="idpageskategori" id="idpageskategori">                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Kategori</label>
                    <div class="col-md-9">
                      <input type="text" name="namapageskategori" id="namapageskategori" class="form-control" placeholder="Nama Kategori Page" autofocus="">
                      <p id="slug"></p>
                    </div>
                  </div>                  
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Deskripsi</label>
                    <div class="col-md-9">
                      <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi`"></textarea>
                    </div>
                  </div>                      
                  
                                       

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('pageskategori')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idpageskategori = "<?php echo($idpageskategori) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idpageskategori != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("pageskategori/get_edit_data") ?>', 
              data        : {idpageskategori: idpageskategori}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            // console.log(result);
            $("#idpageskategori").val(result.idpageskategori);
            $("#namapageskategori").val(result.namapageskategori);
            $("#deskripsi").val(result.deskripsi);
            $("#slug").val(result.slug);
          }); 


          $("#lbljudul").html("Edit Data Kategori Pages");
          $("#lblactive").html("Edit");

    }else{
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
        namapageskategori: {
          validators:{
            notEmpty: {
                message: "nama pages kategori tidak boleh kosong"
            },
          }
        },
        deskripsi: {
          validators:{
            notEmpty: {
                message: "deskripsi tidak boleh kosong"
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
