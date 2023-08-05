 

 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2"><?php echo $rowkelas->namakelas  ?></h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('registrasikelas/index/'.$idkelas)) ?>"><?php echo $rowkelas->namakelas  ?></a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('registrasikelas/simpan')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">Data Jemaat</h3><hr>                    

                  <input type="hidden" name="idregistrasikelas" id="idregistrasikelas">   
                  <input type="hidden" name="idkelas" id="idkelas" value="<?php echo $idkelas ?>">

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nomor / Tgl. Sertifikat</label>
                    <div class="col-md-3">
                      <input type="text" name="nomorsertifikat" id="nomorsertifikat" class="form-control" placeholder="Nomor Sertifikat">
                    </div>
                    <label for="" class="col-md-1 col-form-label text-center">/</label>
                    <div class="col-md-3">
                      <input type="date" name="tglsertifikat" id="tglsertifikat" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                  </div> 


                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Peserta</label>
                    <div class="col-md-9">
                      <select name="idjemaat" id="idjemaat" class="form-control select2">
                        <option value="">Pilih nama peserta...</option>
                        <?php  
                          $rsjemaat = $this->db->query("select * from jemaat order by namalengkap");
                          if ($rsjemaat->num_rows()>0) {
                            foreach ($rsjemaat->result() as $row) {
                                echo '<option value="'.$row->idjemaat.'">'.$row->namalengkap.'</option>';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div> 

                  

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('registrasikelas/index/'.$idkelas)) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idregistrasikelas = "<?php echo($idregistrasikelas) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idregistrasikelas != "" ) { 
          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("registrasikelas/get_edit_data") ?>', 
              data        : {idregistrasikelas: idregistrasikelas}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            $("#idregistrasikelas").val(result.idregistrasikelas);
            $("#idkelas").val(result.idkelas);
            $("#nomorsertifikat").val(result.nomorsertifikat);
            $("#tglsertifikat").val(result.tglsertifikat);
            $("#idjemaat").val(result.idjemaat).trigger('change');


          }); 


          $("#lbljudul").html("Edit Data Peserta Kelas");
          $("#lblactive").html("Edit");

    }else{
          $("#lbljudul").html("Tambah Data Peserta Kelas");
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
        idjemaat: {
          validators:{
            notEmpty: {
                message: "nama peserta tidak boleh kosong"
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
