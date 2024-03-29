 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Group</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('group')) ?>">Group</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('group/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">                      
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

                  <h3 class="text-gray">Data Group</h3><hr>                    

                  <input type="hidden" name="idgroup" id="idgroup">                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nama Group</label>
                    <div class="col-md-9">
                      <input type="text" name="namagroup" id="namagroup" class="form-control" placeholder="Nama group" autofocus="">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Group Head</label>
                    <div class="col-md-9">
                      <input type="text" name="namalengkap" id="namalengkap" class="form-control" placeholder="Nama Kepala Grup">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">facebook</label>
                    <div class="col-md-9">
                      <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Url Facebook">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Instagram</label>
                    <div class="col-md-9">
                      <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Url Instagram">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Status Aktif</label>
                    <div class="col-md-9">
                      <select name="statusaktif" id="statusaktif" class="form-control">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                      </select>
                    </div>
                  </div>       

                  <div class="form-group row required">
                   <label for="" class="col-md-3 col-form-label">Foto Group <small class="text-danger"> (Max 200KB)</small></label>
                   <div class="col-md-9">
                    <div class="row">
                      <div class="col-12">
                         <input type="file" name="fotogroup" id="fotogroup">
                         <input type="hidden" name="fotogroup_lama" id="fotogroup_lama">
                      </div>
                      <div class="col-12">
                        <a href="" id="linkfotogroup" target="_blank"></a>
                      </div>
                    </div>
                   </div>
                 </div>

                                       

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('group')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idgroup = "<?php echo($idgroup) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idgroup != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("group/get_edit_data") ?>', 
              data        : {idgroup: idgroup}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            // console.log(result);
            $("#idgroup").val(result.idgroup);
            $("#namagroup").val(result.namagroup);
            $("#idjemaathead").val(result.idjemaathead).trigger('change');
            $("#statusaktif").val(result.statusaktif);
            $("#fotogroup_lama").val(result.fotogroup);
            $("#namalengkap").val(result.namalengkap);
            $("#email").val(result.email);
            $("#facebook").val(result.facebook);
            $("#instagram").val(result.instagram);

             $('#linkFotogroup').html(result.fotogroup);
             $('#linkFotogroup').attr('href', "<?php echo base_url('uploads/group/') ?>"+result.fotogroup);

          }); 


          $("#lbljudul").html("Edit Data Group");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Group");
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
        namagroup: {
          validators:{
            notEmpty: {
                message: "namagroup tidak boleh kosong"
            },
          }
        },
        namalengkap: {
          validators:{
            notEmpty: {
                message: "nama kepala group tidak boleh kosong"
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
