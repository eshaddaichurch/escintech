<?php
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>

<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Daftar Anggota DC</h4>
    </div>
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('dcmember')) ?>">Disciples Community Member</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>

    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



    
    <form action="<?php echo(site_url('dcmember/simpan')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">Data DC Member</h3><hr>                    

                  <input type="hidden" name="iddcmember" id="iddcmember">                      
                                   
                  <h3></h3>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama DC </label>
                    <div class="col-md-9">
                      <select name="iddc" id="iddc" class="form-control select2">
                        <option value="">Pilih Nama DC</option>
                        <?php  
                          $rsdisciplescommunity = $this->db->query("select * from disciplescommunity order by namadc");
                          if ($rsdisciplescommunity->num_rows()>0) {
                            foreach ($rsdisciplescommunity->result() as $rowdisciplescommunity) {
                              echo '
                                <option value="'.$rowdisciplescommunity->iddc.'">'.$rowdisciplescommunity->namadc.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>

                    </div>
                  </div> 

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Member DC</label>
                    <div class="col-md-9">
                      <select name="idjemaat" id="idjemaat" class="form-control select2">
                        <option value="">Pilih nama member dc</option>
                        <?php  
                          $rsjemaat = $this->db->query("select * from jemaat order by namalengkap");
                          if ($rsjemaat->num_rows()>0) {
                            foreach ($rsjemaat->result() as $rowjemaat) {
                              echo '
                                <option value="'.$rowjemaat->idjemaat.'">'.$rowjemaat->namalengkap.'</option>
                              ';
                            }
                          }
                        ?>
                      </select>

                    </div>
                  </div>  

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Status Keanggotaan</label>
                    <div class="col-md-9">
                      <select name="statuskeanggotaan" id="statuskeanggotaan" class="form-control">
                        <option value="Anggota">Anggota</option>
                        <option value="Core Team">Core Team</option>
                        <option value="Disciples maker">Disciples maker</option>
                      </select>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Keterangan</label>
                    <div class="col-md-9">
                      <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Keterangan"></textarea>
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

                                       

              </div> <!-- ./card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo(site_url('dcmember')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  var iddcmember = "<?php echo $iddcmember ?>";
  

  $(document).ready(function() {

    $('.select2').select2();
    //---------------------------------------------------------> JIKA EDIT DATA
    if ( iddcmember != "" ) { 

          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("dcmember/get_edit_data") ?>', 
              data        : {iddcmember: iddcmember}, 
              dataType    : 'json', 
              encode      : true
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

    }else{
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
          validators:{
            notEmpty: {
                message: "nama dc tidak boleh kosong"
            },
          }
        },
        kategoridc: {
          validators:{
            notEmpty: {
                message: "kategori dc tidak boleh kosong"
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