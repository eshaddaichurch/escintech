 <?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");
?>


<div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Pengkhotbah2</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo(site_url('pengkhotbah2')) ?>">Pengkhotbah2</a></li>
        <li class="breadcrumb-item active" id="lblactive"></li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12">



      <form action="<?php echo(site_url('pengkhotbah2/simpan')) ?>" method="post" id="form">                      
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

                  <h3 class="text-gray">Data Pengkhotbah</h3><hr>                    

                  <input type="hiden" name="idpengkhotbah" id="idpengkhotbah">                      
                                   
                  <h3></h3>
                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Pengkhotbah</label>
                    <div class="col-md-9">
                      <select name="idjemaat" id="idjemaat" class="form-control select2">
                        <option value="">Pilih nama pengkhotbah</option>
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
                    <label for="" class="col-md-3 col-form-label">Tanggal SK</label>
                    <div class="col-md-9">
                      <input type="date" name="tanggalskpengkotbah" id="tanggalskpengkotbah" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tanggal SK Berakhir</label>
                    <div class="col-md-9">
                      <input type="date" name="tanggalskberakhir" id="tanggalskberakhir" class="form-control">
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
                <a href="<?php echo(site_url('pengkhotbah2')) ?>" class="btn btn-default float-right mr-1 ml-1"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
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
  
  var idpengkhotbah = "<?php echo($idpengkhotbah) ?>";

  $(document).ready(function() {

    $('.select2').select2();

    //---------------------------------------------------------> JIKA EDIT DATA
    if ( idpengkhotbah != "" ) {  //edit (ada isi idpengkhotbah)

          $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("pengkhotbah2/get_edit_data") ?>', 
              data        : {'idpengkhotbah': idpengkhotbah}, 
              dataType    : 'json', 
              encode      : true
          })      
          .done(function(result) {
            console.log(result);
            $("#idpengkhotbah").val(result.idpengkhotbah);
            $("#idjemaat").val(result.idjemaat).trigger('change');
            $("#tanggalskpengkotbah").val(result.tanggalskpengkotbah);
            $("#tanggalskberakhir").val(result.tanggalskberakhir);
            $("#keterangan").val(result.keterangan);
            $("#statusaktif").val(result.statusaktif);
          }); 


          $("#lblactive").html("Edit");

    }else{
          $("#lblactive").html("Tambah");
    }     

    


    $("form").attr('autocomplete', 'off');
    $("#rtrw").mask("000/000", {placeholder:"000/000"});
  }); //end (document).ready
  



</script>

</body>
</html>
