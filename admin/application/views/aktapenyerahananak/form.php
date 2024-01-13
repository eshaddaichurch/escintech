 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Akta Penyerahan Anak</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('aktapenyerahaananak')) ?>">Akta Penyerahan Anak</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('aktapenyerahaananak/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">                      
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

                  <h3 class="text-gray">Data Akta Penyerahan Anak</h3><hr>                    

                  <input type="hidden" name="idgroup" id="idgroup">                      

                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Nomor Akta</label>
                    <div class="col-md-9">
                      <input type="text" name="noakta" id="noakta" class="form-control" placeholder="Nomor akta" autofocus="">
                    </div>
                  </div>                      
                  <div class="form-group row required">
                    <label for="" class="col-md-3 col-form-label">Tanggal Akta</label>
                    <div class="col-md-3">
                      <input type="date" name="tglakta" id="tglakta" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Dilakukan Oleh</label>
                    <div class="col-md-9">
                      <input type="text" name="dilakukanoleh" id="dilakukanoleh" class="form-control" placeholder="Dilakukan oleh">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Anak</label>
                    <div class="col-md-9">
                      <select name="idjemaatanak" id="idjemaatanak" class="form-control select2">
                        <option value="">Pilih nama anak ...</option>
                        <?php  
                          $rsTTD = $this->App->getDaerahAkta();
                          if ($rsTTD->num_rows()>0) {
                            foreach ($rsTTD->result() as $row) {
                              echo '
                                  <option value="'.$row->iddaerahakta.'">'.$row->namadaerahakta.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Ayah</label>
                    <div class="col-md-9">
                      <input type="text" name="namajemaatayah" id="namajemaatayah" class="form-control" placeholder="Nama ayah">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Ibu</label>
                    <div class="col-md-9">
                      <input type="text" name="namajemaatibu" id="namajemaatibu" class="form-control" placeholder="Nama ibu">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Daerah TTD</label>
                    <div class="col-10 col-md-8">
                      <select name="idda1rahakta" id="iddaerahakta" class="form-control select2">
                        <option value="">Pilih nama daerah tanda tangan ...</option>
                        <?php  
                          $rsTTD = $this->App->getDaerahAkta();
                          if ($rsTTD->num_rows()>0) {
                            foreach ($rsTTD->result() as $row) {
                              echo '
                                  <option value="'.$row->iddaerahakta.'">'.$row->namadaerahakta.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-2 col-md-1">
                      <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Cabang GBI</label>
                    <div class="col-10 col-md-8">
                      <select name="idcabangakta" id="idcabangakta" class="form-control select2">
                        <option value="">Pilih cabang GBI ...</option>
                        <?php  
                          $rsCabangAkta = $this->App->getCabangAkta();
                          if ($rsCabangAkta->num_rows()>0) {
                            foreach ($rsCabangAkta->result() as $row) {
                              echo '
                                  <option value="'.$row->idcabangakta.'">'.$row->namacabangakta.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-2 col-md-1">
                      <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>


                                

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('aktapenyerahaananak')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
              url         : '<?php echo site_url("aktapenyerahaananak/get_edit_data") ?>', 
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


          $("#lbljudul").html("Edit Data Akta Penyerahan Anak");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Akta Penyerahan Anak");
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
